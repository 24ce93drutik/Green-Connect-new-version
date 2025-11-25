<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Connect - About</title>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-left">
        <div class="logo-icon">🌿</div>
        <span class="logo-text">Green Connect</span>
    </div>

    <ul class="nav-links">
        <li><a href="index.php">Browse Plants</a></li>
        <li><a href="#">Community Forum</a></li>
        <li><a class="active" href="#">About</a></li>
        <li><a href="#">Database</a></li>
    </ul>

    <div class="nav-right">
        <button class="db-admin">DB Admin</button>
        <button class="signin">Sign In</button>
        <button class="list-plant">+ List Plant</button>
    </div>
</nav>

<!-- ABOUT SECTION -->
<section class="about-section">
    <h2>About Green Connect</h2>
    <p class="about-text">
        Green Connect brings together plant lovers in your local community. Whether you have extra plants to share,
        are looking for new varieties, or simply want to connect with fellow enthusiasts, we make it easy to build a
        greener, more sustainable future together.
    </p>
</section>

<!-- FEATURES GRID -->
<section class="features">
    <div class="feature-box">
        <div class="feature-icon">🔄</div>
        <h3>Grow Together</h3>
        <p>Connect with local plant enthusiasts and share your passion for greenery</p>
    </div>

    <div class="feature-box">
        <div class="feature-icon">🧑‍🤝‍🧑</div>
        <h3>Build Community</h3>
        <p>Create lasting relationships with neighbors who share your love for plants</p>
    </div>

    <div class="feature-box">
        <div class="feature-icon">♻️</div>
        <h3>Sustainability</h3>
        <p>Reduce waste by giving plants a new home instead of throwing them away</p>
    </div>

    <div class="feature-box">
        <div class="feature-icon">💚</div>
        <h3>Share Knowledge</h3>
        <p>Learn from experienced gardeners and share your own tips and tricks</p>
    </div>
</section>

<!-- COMMUNITY SECTION -->
<section class="community-banner">
    <h2>Join Our Growing Community</h2>
    <p>
        Every plant shared is a step towards a more sustainable and connected community.  
        Together, we can reduce waste, beautify our neighborhoods, and help each other grow thriving green spaces.
    </p>
</section>
<?php
include "footer.php";
?>
</body>
</html>
