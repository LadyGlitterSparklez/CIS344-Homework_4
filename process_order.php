<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: order.php");
    exit;
}

// create short variable names
// uCertify: trim() a function that strips whitespace from the start and end of a string and returns the resulting string.
$firstName = trim($_POST["first_name"]);
$lastName  = trim($_POST["last_name"]);
$phone     = trim($_POST["phone"]);
$email     = trim($_POST["email"]);
$address   = trim($_POST["address"]);
$zip       = trim($_POST["zip"]);
$state     = trim($_POST["state"]);
$city      = trim($_POST["city"]);

// checks how many pizzas were selected
$qty_marg = isset($_POST['qty_Margherita_Supreme']) ? (int)$_POST['qty_Margherita_Supreme'] : 0;
$qty_pep  = isset($_POST['qty_Pepperoni_Passion']) ? (int)$_POST['qty_Pepperoni_Passion'] : 0;
$qty_veg  = isset($_POST['qty_Veggie_Delight']) ? (int)$_POST['qty_Veggie_Delight'] : 0;
$qty_meat = isset($_POST['qty_Meat_Lovers_Feast']) ? (int)$_POST['qty_Meat_Lovers_Feast'] : 0;
$qty_bbq  = isset($_POST['qty_BBQ_Chicken_Bliss']) ? (int)$_POST['qty_BBQ_Chicken_Bliss'] : 0;
$qty_med  = isset($_POST['qty_Mediterranean_Marvel']) ? (int)$_POST['qty_Mediterranean_Marvel'] : 0;

// calculates the price 
$totalPrice = ($qty_marg * 12.99) + ($qty_pep * 14.99) + ($qty_veg * 13.99) + 
              ($qty_meat * 15.99) + ($qty_bbq * 14.99) + ($qty_med * 16.99);

// adds only the selected pizzas into an array
$orderArray = [];
if ($qty_marg > 0) $orderArray[] = $qty_marg . "x Margherita Supreme";
if ($qty_pep > 0)  $orderArray[] = $qty_pep . "x Pepperoni Passion";
if ($qty_veg > 0)  $orderArray[] = $qty_veg . "x Veggie Delight";
if ($qty_meat > 0) $orderArray[] = $qty_meat . "x Meat Lover's Feast";
if ($qty_bbq > 0)  $orderArray[] = $qty_bbq . "x BBQ Chicken Bliss";
if ($qty_med > 0)  $orderArray[] = $qty_med . "x Mediterranean Marvel";

// implode() joins array elements with a string reference: https://www.php.net/manual/en/function.implode.php
$orderSummaryStr = implode(", ", $orderArray); 

// allows us to get the last 4 digits of the card referemce: https://www.w3schools.com/php/func_regex_preg_replace.asp
$cardNumber = preg_replace('/\D/', '', $_POST["card_number"]);
$cardLast4  = substr($cardNumber, -4);

// makes sure the user enters stuff into the boxes if not give error message
if (empty($firstName) || empty($lastName) || empty($phone) || empty($email) || empty($address) || empty($city) || empty($zip) || empty($state)) {
    header("Location: order.php?error=You have not entered all the required details.");
    exit;
} elseif ($totalPrice == 0) {
    header("Location: order.php?error=You have not selected any pizzas to order.");
    exit;
} elseif (strlen($cardLast4) !== 4) {
    header("Location: order.php?error=Invalid card number. Please try again.");
    exit;
}

// insert query
$query = "INSERT INTO orders (first_name, last_name, phone, email, address, city, state, zip_code, order_summary, total_price, card_last4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// ucertify: bind_param() variables that should be sub for the question marks
$stmt = $db->prepare($query);
$stmt->bind_param("sssssssssds", $firstName, $lastName, $phone, $email, $address, $city, $state, $zip, $orderSummaryStr, $totalPrice, $cardLast4);
$stmt->execute();

// if everything is good redirect user to receipt with totalprice, if not give error message
if ($stmt->affected_rows > 0) {
    header("Location: receipt.php?total=" . urlencode($totalPrice));
    exit;
} else {
    header("Location: order.php?error=An error has occurred. The order was not processed.");
    exit;
}

$stmt->close();
$db->close();
?>