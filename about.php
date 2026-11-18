<?php
$title = "About"; // tab title
include "header.php"; // includes the header so that we will see the navigation bar across all pages
?>

<h1 class="center-text">About Us</h1> <!-- centers the words -->

<div class="flex-row"> <!-- References Used: https://www.w3schools.com/css/css_selectors.asp -->
    <img src="Owner1.png" alt="Owner 1" class="owner-img">
    
    <div>
        <h2>Matteo Giovanni</h2>
        <p>
            Matteo Giovanni was only 20 years old when he opened up a small pizza shop in 
            sicily, Italy. Inspired to bring his flavors to other parts of the world, he traveled
            to New York City to open up Faccio la Pizza!
        </p>
    </div>
</div>

<hr class="divider"> <!-- Reference Used: https://www.w3schools.com/tags/tag_hr.asp -->

<div class="flex-row"> <!-- References Used: https://www.w3schools.com/css/css_selectors.asp -->
    <img src="Owner2.png" alt="Owner 2" class="owner-img">
    
    <div>
        <h2>Nico Giovanni</h2>
        <p>
            Inspired by his father, Matteo Giovanni, Nico brings new perspective on the infamous New York Slice.
            Nico continues to run the business even after the passing of the late Matteo Giovanni.
        </p>
    </div>
</div>

<?php
include "footer.php"; // references the footer file
?>