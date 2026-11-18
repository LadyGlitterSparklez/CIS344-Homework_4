<?php
$title = "Order Receipt";
include "header.php";
include "db.php";

if (!isset($_GET['total'])) {
    echo '<p class="center-text">No order found. Please <a href="order.php">place an order</a>.</p>';
    include "footer.php";
    exit;
}

// this was to add 20 minutes to the time reference: https://www.w3schools.com/php/func_date_strtotime.asp
$totalPaid = number_format($_GET['total'], 2);
$arrivalTime = date("h:i A", strtotime("+20 minutes"));

//show me the most recent order from the database
$query = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
$result = $db->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    //uCertify: htmlspecialchars() protects against XSS attacks as said previously 
    $firstName = htmlspecialchars($row['first_name']);
    $lastName = htmlspecialchars($row['last_name']);
    $email = htmlspecialchars($row['email']);
    $address = htmlspecialchars($row['address']);
    $city = htmlspecialchars($row['city']);
    $state = htmlspecialchars($row['state']);
    $zip = htmlspecialchars($row['zip_code']);
    $orderSummaryStr = htmlspecialchars($row['order_summary']);
    $cardLast4 = htmlspecialchars($row['card_last4']);
?>

<!-- html stuff again -->
    <div class="center-text receipt-container">
        <h1>Thank you so much, <?php echo $firstName . " " . $lastName; ?>!</h1>
        
        <div class="receipt-box">
            <h3 class="receipt-title">Order Summary</h3>
            <p><b>You Ordered:</b><br> <?php echo $orderSummaryStr; ?></p>
            <p><b>Payment Method:</b> Card ending in <?php echo $cardLast4; ?></p>
            <p><b>Total Paid:</b> $<?php echo $totalPaid; ?></p>
            
            <hr class="divider">
            
            <h3>Est. Arrival Time</h3>
            <p>Your Pizza will arrive at:</p>
            <p class="arrival-time"><?php echo $arrivalTime; ?></p>
            
            <p><b>To:</b><br>
            <?php echo $firstName . " " . $lastName; ?><br>
            <?php echo $address; ?><br>
            <?php echo $city . ", " . $state . " " . $zip; ?></p>
        </div>

        <p>A receipt has been sent to: <b><?php echo $email; ?></b></p>
        <p><a href="home.php">Return Home</a></p>
    </div>

<?php // if all else fails...
} else {
    echo '<p class="center-text">Could not retrieve order details.</p>';
}
$db->close();
include "footer.php"; 
?>