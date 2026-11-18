<?php
$title = "Order Now";
include "header.php";
?>

<h1 class="center-text">Order Now</h1>

<?php 
// checks if process_order.php sent back an error message
// uCertify uses htmlspecialchars and its supposed to prevent XSS attacks and make user input plain text
if (isset($_GET['error'])) {
    echo '<p class="center-text error-message"><b>' . htmlspecialchars($_GET['error']) . '</b></p>';
}
?>

<!-- this is just html to make form boxes so that the user may enter information/data along with header for the boxes -->

<form method="POST" action="process_order.php" class="order-form">

    <h2>Enter your info</h2>
    <div class="form-row">
        <div class="form-col">
            <label>First Name</label>
            <input type="text" name="first_name" required>
        </div>
        <div class="form-col">
            <label>Last Name</label>
            <input type="text" name="last_name" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-col">
            <label>Phone Number</label>
            <input type="tel" name="phone" required>
        </div>
        <div class="form-col">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
    </div>

    <hr class="divider">
    
    <h2>Enter Your Address</h2>
    <div class="form-row">
        <div class="form-col">
            <label>Address</label>
            <input type="text" name="address" required>
        </div>
        <div class="form-col">
            <label>ZIP</label>
            <input type="text" name="zip" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-col">
            <label>City</label>
            <input type="text" name="city" required>
        </div>
        <div class="form-col">
            <label>State</label>
            <input type="text" name="state" required>
        </div>
    </div>

    <hr class="divider"> <!-- line to seperate for aesthetic purposes -->
    
    <h2>Order a Pizza</h2>
    <div class="menu-container">
        
        <!-- pizza 1 -->
        <div class="menu-item order-menu-item">
            <div class="order-menu-text">
                <div class="menu-header"><span>Margherita Supreme</span></div>
                <p class="menu-desc">Tomato sauce, mozzarella cheese, fresh basil leaves, sliced tomatoes.</p>
            </div>
            <div class="order-menu-qty">
                <span class="order-price">$12.99</span>
                <select name="qty_Margherita_Supreme" class="qty-select">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                </select>
            </div>
        </div>

        <!-- pizza 2 -->
        <div class="menu-item order-menu-item">
            <div class="order-menu-text">
                <div class="menu-header"><span>Pepperoni Passion</span></div>
                <p class="menu-desc">Tomato sauce, mozzarella cheese, pepperoni slices, black olives, red pepper flakes.</p>
            </div>
            <div class="order-menu-qty">
                <span class="order-price">$14.99</span>
                <select name="qty_Pepperoni_Passion" class="qty-select">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                </select>
            </div>
        </div>

        <!-- pizza 3 -->
        <div class="menu-item order-menu-item">
            <div class="order-menu-text">
                <div class="menu-header"><span>Veggie Delight</span></div>
                <p class="menu-desc">Tomato sauce, mozzarella cheese, bell peppers, red onions, mushrooms, spinach.</p>
            </div>
            <div class="order-menu-qty">
                <span class="order-price">$13.99</span>
                <select name="qty_Veggie_Delight" class="qty-select">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                </select>
            </div>
        </div>

        <!-- pizza 4 -->
        <div class="menu-item order-menu-item">
            <div class="order-menu-text">
                <div class="menu-header"><span>Meat Lover's Feast</span></div>
                <p class="menu-desc">Tomato sauce, mozzarella cheese, Italian sausage, bacon, ham, ground beef.</p>
            </div>
            <div class="order-menu-qty">
                <span class="order-price">$15.99</span>
                <select name="qty_Meat_Lovers_Feast" class="qty-select">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                </select>
            </div>
        </div>

        <!-- pizza 5 -->
        <div class="menu-item order-menu-item">
            <div class="order-menu-text">
                <div class="menu-header"><span>BBQ Chicken Bliss</span></div>
                <p class="menu-desc">BBQ sauce, mozzarella cheese, grilled chicken, red onions, cilantro.</p>
            </div>
            <div class="order-menu-qty">
                <span class="order-price">$14.99</span>
                <select name="qty_BBQ_Chicken_Bliss" class="qty-select">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                </select>
            </div>
        </div>

        <!-- pizza 6 -->
        <div class="menu-item order-menu-item">
            <div class="order-menu-text">
                <div class="menu-header"><span>Mediterranean Marvel</span></div>
                <p class="menu-desc">Pesto sauce, feta cheese, Kalamata olives, artichoke hearts, sun-dried tomatoes.</p>
            </div>
            <div class="order-menu-qty">
                <span class="order-price">$16.99</span>
                <select name="qty_Mediterranean_Marvel" class="qty-select">
                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                </select>
            </div>
        </div>

    </div>

    <hr class="divider">
    

    
    <h2>Payment</h2>
    <div class="form-row">
        <div class="form-col">
            <label>Name on Card</label>
            <input type="text" name="name_on_card" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-col">
            <label>Card Number</label>
            <input type="text" name="card_number" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-col">
            <label>Exp Date</label>
            <input type="text" name="exp_date" required>
        </div>
        <div class="form-col">
            <label>CCV</label>
            <input type="text" name="ccv" required>
        </div>
    </div>

    <button type="submit" class="order-btn">PROCESS ORDER</button>
</form>

<?php include "footer.php"; ?>