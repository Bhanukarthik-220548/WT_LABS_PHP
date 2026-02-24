<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["file"]["name"]). " has been uploaded.";

        
        echo "<a href='download.php?file=" . htmlspecialchars(basename($_FILES["file"]["name"])) . "'><button>Download Uploaded File</button></a>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

}
?>