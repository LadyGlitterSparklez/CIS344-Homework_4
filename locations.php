<?php
$title = "Locations";
include "header.php"; // uses header file
?>

<h1 class="center-text">Our Locations</h1> <!-- centers the text... -->

<!-- References Used: https://www.w3schools.com/html/html_classes.asp -->

<div class="locations-container">

    <div class="location-item">
        <img src="Location1.png" alt="Location 1" class="location-img"> <!-- inserts an image -->
        <div>
            <h2>Union Square</h2>
            <p>123 Club St<br>New York, NY 10001</p>
            <p>(123) 456-7890</p>
        </div>
    </div>

    <div class="location-item">
        <img src="Location2.png" alt="Location 2" class="location-img"> <!-- inserts an image -->
        <div>
            <h2>Harlem</h2>
            <p>456 Roosevelt Rd<br>New York, NY 10001</p>
            <p>(123) 456-7890</p>
        </div>
    </div>

    <div class="location-item">
        <img src="Location3.png" alt="Location 3" class="location-img"> <!-- inserts an image -->
        <div>
            <h2>Soho</h2>
            <p>789 Arthur Ave<br>New York, NY 10001</p>
            <p>(123) 456-7890</p>
        </div>
    </div>

</div>

<?php
include "footer.php"; // uses footer file
?>