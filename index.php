<?php
include "db.php";
session_start();

if (!isset($_SESSION["username"])) {
    // user not logged in → redirect to login page
    header("Location: auth.php");
    exit;
}

$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Green Connect</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="footer.css">

</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="logo">🌱 Green Connect</div>
    <div class="menu">
      <a href="index.php">Browse Plants</a>
      <a href="community.php">Community Forum</a>
      <a href="about.php">About</a>
      <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=green_connect"  target="_blank">Database</a>
    </div>
  <div class="actions">
  <!--   -->
  
  <?php if (isset($_SESSION["username"])): ?>
    <a href="#" class="btn-green" style="text-decoration: none;">👤 <?php echo $_SESSION["username"]; ?></a>
<?php else: ?>
    <a href="auth.php" class="btn-green" style="text-decoration: none;">👤 Sign In</a>
<?php endif; ?>

  <a href="plants.php" class="btn-green" style="text-decoration: none;">+ List Plant</a>
  <a href="logout.php" class="btn-green" style="text-decoration: none;">Logout</a>
   </div>

  </div>

  <!-- Hero Section -->
  <div class="hero">
    <h2>Connect, Share, and Grow Together</h2>
    <p>Join our local community of plant lovers. Share extra plants, discover new varieties, and build a greener, more sustainable future together.</p>

    <div class="search-bar">
      <input id="searchInput" type="text" placeholder="Search plants by name or location...">
      <button onclick="searchPlant()">Search</button>
    </div>

    
  </div>

  <!-- Plant Grid -->
  <div class="plant-grid" id="plantGrid">
<?php
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        // Image path → uploaded images stored in "uploads/"
        $imagePath = $row['p_image'];
?>
   <div class="plant-card">
        <img src="<?php echo $imagePath; ?>" alt="<?php echo $row['p_name']; ?>">

        <div class="plant-info">
            <h3><?php echo $row['p_name']; ?></h3>

            <div class="price">Free</div>

            <p><?php echo $row['p_description']; ?></p>

            <p>📍 <?php echo $row['p_location']; ?></p>

            <p><i>by <?php echo $row['p_owner_name']; ?></i></p>
          </div>
          <button class="contact-btn"><a href="tel:<?php echo $row['p_phone_no']; ?>" style="text-decoration: none; color: white">Contact Owner</a></button>

        
        
    </div>
    <?php
    }
} else {
    echo "<p>No plants found.</p>";
}
?>

    
</div>

  <script>
    function searchPlant() {
      const input = document.getElementById('searchInput').value.toLowerCase();
      const cards = document.querySelectorAll('.plant-card');
      cards.forEach(card => {
        const title = card.querySelector('h3').innerText.toLowerCase();
        card.style.display = title.includes(input) ? 'flex' : 'none';
      });
    }
  </script>
<?php
include "footer.php";
?>
</body>
</html>

  