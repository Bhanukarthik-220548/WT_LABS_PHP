<?php
// Load configuration and environment variables
require_once 'config.php';

// Handle OAuth callback
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    
    // Exchange authorization code for access token
    $tokenURL = "https://oauth2.googleapis.com/token";
    $postData = [
        'code' => $code,
        'client_id' => GOOGLE_CLIENT_ID,
        'client_secret' => GOOGLE_CLIENT_SECRET,
        'redirect_uri' => GOOGLE_REDIRECT_URI,
        'grant_type' => 'authorization_code'
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tokenURL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode === 200) {
        $tokenData = json_decode($response, true);
        
        if (isset($tokenData['access_token'])) {
            $accessToken = $tokenData['access_token'];
            
            // Fetch user info from Google
            $userInfoURL = "https://www.googleapis.com/oauth2/v2/userinfo?access_token=" . urlencode($accessToken);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $userInfoURL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $userResponse = curl_exec($ch);
            curl_close($ch);
            
            $userData = json_decode($userResponse, true);
            
            if (isset($userData['email'])) {
                $googleEmail = $userData['email'];
                $googleName = $userData['name'] ?? 'Google User';
                
                // Get MongoDB connection and save/update user
                $db = getDBConnection();
                $collection = $db->foodie;
                
                // Try to find existing user or create new one
                $existingUser = $collection->findOne(['email' => $googleEmail]);
                
                if (!$existingUser) {
                    // Create new user for Google OAuth
                    try {
                        $collection->insertOne([
                            'name' => $googleName,
                            'email' => $googleEmail,
                            'password' => null, // OAuth users don't have passwords
                            'google_id' => $userData['id'],
                            'created_at' => new MongoDB\BSON\UTCDateTime()
                        ]);
                    } catch (Exception $e) {
                        error_log("Failed to create Google user: " . $e->getMessage());
                    }
                }
                
                // Store in session
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['user_email'] = $googleEmail;
                $_SESSION['user_name'] = $googleName;
                $_SESSION['access_token'] = $accessToken;
                
                // Redirect to main page
                header("Location: main.php");
                exit();
            }
        }
    }
    
    // If we get here, something went wrong
    error_log("OAuth token exchange failed. HTTP Code: " . $httpCode);
    echo "Error: Failed to complete Google login. Please try again.";
    
} else if (isset($_GET['error'])) {
    // User denied access or other error
    echo "Error: " . htmlspecialchars($_GET['error_description'] ?? $_GET['error']);
} else {
    echo "Error: Invalid OAuth callback.";
}