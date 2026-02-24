<?php
// Load configuration and environment variables
require_once 'config.php';

// Check if user is logged in
$is_logged_in = !empty($_SESSION['logged_in']) || !empty($_SESSION['user_email']);
$user_name = $_SESSION['user_name'] ?? 'Guest';
$user_email = $_SESSION['user_email'] ?? '';

// Check if profile card should be shown
$show_profile_card = $is_logged_in && empty($_SESSION['profile_shown']);

// Mark profile as shown for this session
if ($is_logged_in && empty($_SESSION['profile_shown'])) {
    $_SESSION['profile_shown'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <style>
        .profile-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            animation: slideIn 0.5s ease-out;
            position: relative;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(-50px);
            }
        }
        .profile-card.hiding {
            animation: slideOut 0.5s ease-out forwards;
        }
        .profile-card h2 {
            margin: 0 0 10px 0;
            font-size: 24px;
            padding-right: 30px;
        }
        .profile-card .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.3);
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background 0.3s;
            padding: 0;
        }
        .profile-card .close-btn:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        .profile-card .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .profile-card .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: white;
            color: #667eea;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            flex-shrink: 0;
        }
        .profile-card .user-details p {
            margin: 5px 0;
            font-size: 14px;
        }
        .profile-card .logout-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 16px;
            background: white;
            color: #667eea;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            transition: background 0.3s;
        }
        .profile-card .logout-btn:hover {
            background: #f0f0f0;
        }
    </style>
</head>
<body>
    <?php if ($show_profile_card): ?>
    <!-- User Profile Card -->
    <div class="profile-card" id="profileCard">
        <button class="close-btn" onclick="closeProfileCard()">✕</button>
        <h2>Welcome!</h2>
        <div class="user-info">
            <div class="avatar"><?php echo strtoupper(substr($user_name, 0, 1)); ?></div>
            <div class="user-details">
                <p><strong><?php echo htmlspecialchars($user_name); ?></strong></p>
                <p><?php echo htmlspecialchars($user_email); ?></p>
            </div>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    <?php endif; ?>
    
    <script>
        const AUTO_HIDE_DURATION = 10000;
        
        function closeProfileCard() {
            const card = document.getElementById('profileCard');
            if (card) {
                card.classList.add('hiding');
                setTimeout(() => {
                    card.remove();
                }, 500);
            }
        }
        
        window.addEventListener('load', function() {
            const card = document.getElementById('profileCard');
            if (card) {
                setTimeout(() => {
                    closeProfileCard();
                }, AUTO_HIDE_DURATION);
            }
        });
    </script>
    <div id="main">
        <div class="navbar">
            <div class="title">
                <a href="#content"><p>Home</p></a> 
                <a href="#recipe"><p>Recipes</p></a>
                <a href="#contact"><p>Contact</p></a>
                 <a href="#aboutus"><p>About Us</p></a>
            </div>
        </div>
        <div class="content">
            <h1>Welcome to Food Court</h1>
            <p>Your only destination for food</p>
        </div>
    </div>
    <div id="recipe">
        <div class="cat">
            <h1>Categories</h1>
        </div>
        <div class="name">
            <a href="#item1"><p>Tiffins</p></a>
            <a href="#item2"><p>Biryani</p></a>
            <a href="#item3"><p>Fastfood</p></a>
            <a href="#item4"><p>Beverages</p></a>
        </div> 
            <div id="item1">
                <h1>Tiffins</h1>
                <div class="i1">
                    <img src="dosa.jpg" alt="birayani" width="200px" height="200px">
                    <p>Dosa</p>
                    <p>price: ₹30</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="idly.jpg" alt="birayani" width="200px" height="200px">
                    <p>Idly</p>
                    <p>price: ₹20</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="vada.webp" alt="birayani" width="200px" height="200px">
                    <p>Vada</p>
                    <p>price: ₹25</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="puri.png" alt="birayani" width="200px" height="200px">
                    <p>Puri</p>
                    <p>price: ₹25</p>
                    <button>order</button>
                </div>
            </div>
            <div id="item2">
                <h1>Biryani</h1>
                <div class="i1">
                    <img src="birayani.jpg" alt="birayani" width="200px" height="200px" >
                    <p>birayani</p>
                    <p>price: ₹120</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="rambo.webp" alt="birayani" width="200px" height="200px">
                    <p>Rambo birayani</p>
                    <p>price: ₹150</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="sp.webp" alt="birayani" width="200px" height="200px">
                    <p>SP birayani</p>
                    <p>price: ₹150</p>
                    <button>order</button>
                </div>
            </div>
            <div id="item3">
                <h1>Fastfood</h1>
                <div class="i1">
                    <img src="cf.webp" alt="birayani" width="200px" height="200px">
                    <p>Chicken fried rice</p>
                    <p>price: ₹80</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="vf.webp" alt="birayani" width="200px" height="200px">
                    <p>Veg fried rice</p>
                    <p>price: ₹70</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="manchurian.jpg" alt="birayani" width="200px" height="200px">
                    <p>Manchurian</p>
                    <p>price: ₹80</p>
                    <button>order</button>
                </div>
                 <div class="i1">
                    <img src="noodles.jpg" alt="birayani" width="200px" height="200px">
                    <p>Noodles</p>
                    <p>price: ₹80</p>
                    <button>order</button>
                </div>
            </div>
            <div id="item4">
                <h1>Beverages</h1>
                <div class="i1">
                    <img src="thumps.webp" alt="birayani" width="200px" height="200px">
                    <p>Thumps Up</p>
                    <p>price: ₹20</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="moutain.webp" alt="birayani" width="200px" height="200px">
                    <p>Mountain Dew</p>
                    <p>price: ₹20</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="mirinda.jpg" alt="birayani" width="200px" height="200px">
                    <p>Mirinda</p>
                    <p>price: ₹20</p>
                    <button>order</button>
                </div>
            </div>
       </div> 
    </div>
    <div id="contact">
        <p>dial:123456789</p>
          <p>dial:123456789</p>
        <a href="complaint.html" style="color: red;margin-top:10px;font-size: 25px;">For complaints </a>
    </div>
    <div id="aboutus">
        <h2>rgukt food court</h2>
        <p>all rights reserved</p>
    </div>
</body>
</html>