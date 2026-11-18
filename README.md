# Faccio la Pizza

Faccio la Pizza is a fake user-friendly website designed to allow users to sift through a hypothetical pizza resturant from nyc. You can view the homepage, descriptions about the owners, the menu, locations around New York, and you're even able to order Pizza.

## Run locally with XAMPP

1. Download this repository
2. Copy the application files into a folder called `faccio_la_pizza`.
3. Open the XAMPP Control Panel and start **Apache**.
4. In your browser go to `localhost/phpmyadmin`
5. Go to `Databases` tab
6. `Create a Database` and enter `faccio_la_pizza` in `Database Name` and press `Create`
7. Go to the `SQL` tab and copy & paste the following

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address VARCHAR(200) NOT NULL,
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    zip_code VARCHAR(100) NOT NULL,
    order_summary TEXT NOT NULL,
    total_price DECIMAL(8,2) NOT NULL,
    card_last4 VARCHAR(4) NOT NULL,
    made_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

8. Press `Go`
9. Confirm the database is named `faccio_la_pizza`. The original settings use `localhost`, user `root`, and a blank database password. 
10. On your browser of choice type `http://localhost/faccio_la_pizza/home.php`
11. Explore the website!

# Main Pages

`Home`: Features a plain picture of Pizza along with Delivery Hours of the shop

`About`: Gives a short description about the previous and current owner of Faccio la Pizza

`Menu`: Current pizzas being served at Faccio la Pizza

`Locations`: All Faccio la Pizza locations

`Order Now`: Allows the user to order a pizza. The user must enter their personal information, address, and payment information in order to recieve a receipt.

# How Does it Work? MySQL x HTML x PHP!

The platform works by passing data from the user's browser to the web server, and finally into the database. Here is the step-by-step flow of how an order is placed:

1. The Form (HTML): When a user goes to `order.php`, they are presented with an HTML form. They fill out their personal info, address, and select how many pizzas they want using dropdown menus. When they click "PROCESS ORDER", the form uses the `POST` method to send all that data securely to a file called `process_order.php`.
2. The Processing (PHP): 
    * `process_order.php` grabs the data from the form. 
    * It uses a PHP array to check which pizzas were selected (quantity > 0) and creates a text summary (like "2x Margherita Supreme"). 
    * It does the math to calculate the total price based on the dropdown quantities.
3. The Database (MySQL): 
    * PHP connects to the MySQL database using `db.php`.
    * The file `process_order.php` uses a prepared SQL `INSERT` statement to save the customer's info, the order summary, and the total price into the `orders` table. 
    * We use prepared statements so the data is saved securely and safely.
4. The Receipt (PHP & HTML):
    * Once the order is successfully saved in the database, PHP redirects the user to `receipt.php`. 
    * This page fetches the most recent order from the database and uses PHP's `date()` and `strtotime()` functions to calculate exactly when the pizza will arrive (current time + 20 minutes). 
    * The HTML then displays this final information in a neat receipt format for the user to see.

# uCertify

Although I used W3Schools and other php websites to make the code, parts of my code came from the course uCertify!

Lessons Used!
* `Lesson 3 - Using Arrays`:
* `Lesson 4 - String Manipulation and Regular Expressions`:
* `Lesson 10 - Working with Your MySQL Database`:
* `Lesson 11 - Accessing Your MySQL Database from the Web with PHP`:

For the code, I used an `Array` to store pizzas that the user selected. I used `trim()` to strip white spaces from user input, and `htmlspecialchars()` to convert user input into HTML entities. I used `mysqli` to connect to the database. I used `bind_param()` to tell PHP to attach variables in a prepared SQL statement to prevent SQL injection.

# Websites Referenced

* https://www.w3schools.com/
* https://www.php.net/docs.php
* https://developer.mozilla.org/en-US/
* https://stackoverflow.com/questions

# Happy Coding ^_^
