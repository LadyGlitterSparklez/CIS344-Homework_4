<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title = 'Faccio la Pizza'; ?></title>
    <link rel="stylesheet" href="style.css"> <!-- links the css file -->
</head>
<body>

<header>

<!-- References Used: https://www.w3schools.com/tags/tag_nav.asp -->
    <nav class="main-nav"> 
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        
        <img src="logo.png" alt="Faccio la Pizza Logo" class="site-logo-img"> 
        <!-- im calling upon the logo source, making a description, then styling it so it isn't super big or super small with a class-->
        
        <a href="menu.php">Menu</a>
        <a href="locations.php">Locations</a>
         <a href="order.php">Order Now</a>
    </nav>
</header>

<main class="page-content">