<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Plant - Green Connect</title>
    <link rel="stylesheet" href="plants.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-left">
        <div class="logo">🌱 Green Connect</div>
        <a href="index.php">Browse Plants</a>
        <a href="community.php">Community Forum</a>
        <a href="about.php">About</a>
        <a href="#">Database</a>
    </div>

    <div class="nav-right">
        <a href="#" class="db-admin">🗄️ DB Admin</a>
        <a href="#" class="signin">👤 Sign In</a>
        <button class="list-btn">+ List Plant</button>
    </div>
</nav>

<!-- BACK LINK -->
<div class="back">
     <a href="index.php">← Back to Browse</a>
</div>

<!-- FORM CONTAINER -->
<div class="form-wrapper">
    <h2>List Your Plant</h2>
    <p class="subtitle">Share your extra plants with the community</p>

    <form action="plants.php" method="POST" enctype="multipart/form-data">

    <label>Plant Name *</label>
    <input type="text" name="p_name" placeholder="Enter Plant Name" values="DumyPlant" required >

    <label>Plant Image *</label>
    <input type="file" name="p_image" accept="image/*" values="null" required>

    <label>Description *</label>
    <textarea name="p_description" placeholder="Enter Description" values="nthg was written" required></textarea>

    <label>Location *</label>
    <input type="text" name="p_location" placeholder="Enter Location" values="null" required>

    <label>Owner Name *</label>
    <input type="text" name="p_owner_name" placeholder="Owner's Name" values="null" required>

    <label>Phone Number *</label>
    <input type="tel" name="p_phone_no" placeholder="Owner's Phone Number" values="0000" required>

    <button type="submit" class="submit">Submit</button>

</form>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['p_name'])) {

$p_name        = $_POST['p_name'];
$p_description = $_POST['p_description'];
$p_location    = $_POST['p_location'];
$p_owner_name  = $_POST['p_owner_name'];
$p_phone_no    = $_POST['p_phone_no'];

// Handle Image Upload
$target_dir = "uploads/";
$filename = time() . "_" . basename($_FILES["p_image"]["name"]);
$target_file = $target_dir . $filename;

if (!is_dir("uploads")) {
    mkdir("uploads");
}

move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file);

$sql = "INSERT INTO posts (p_name, p_image, p_description, p_location, p_owner_name, p_phone_no)
        VALUES ('$p_name', '$target_file', '$p_description', '$p_location', '$p_owner_name', '$p_phone_no')";

if ($conn->query($sql)) {
    echo "Plant Added Successfully!";
} else {
    echo "Error: " . $conn->error;
}
}
$conn->close();

?>

</div>

</body>
</html>
