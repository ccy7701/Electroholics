<?php
    session_start();
    include("../include/config.php");
?>

<!DOCTYPE HTML>
<html lang="en">

<html>

<head>
    <title>Catalogue | Electroholics</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/catalogueStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../siteJavascript.js"></script>
    <script>
        // JavaScript code to handle quantity increment and decrement
        document.addEventListener("DOMContentLoaded", function() {
            const cartItems = document.querySelectorAll(".cart-item");

        cartItems.forEach(item => {
            const quantityInput = item.querySelector(".quantity-input");
            const plusButton = item.querySelector(".plus");
            const minusButton = item.querySelector(".minus");

        plusButton.addEventListener("click", () => {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateTotalPrice(); // You can define this function to update the total price
        });

        minusButton.addEventListener("click", () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateTotalPrice(); // You can define this function to update the total price
            }
        });
    });

    // Function to update the total price
    function updateTotalPrice() {
        // Calculate and update the total price based on quantity and item prices
        // You can implement this calculation as per your requirements
    }
});
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        main {
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 0px;
        }

        header {
            background-color: #02134F;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .cart {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .cart-item {
            display: flex;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            align-items: center;
        }

        .cart-item img {
            width: 100px;
            height: 100px;
            margin-right: 10px;
        }

        .item-details {
            flex-grow: 1;
        }

        .cart-total {
            text-align: right;
            margin-top: 20px;
        }

        .remove-button {
            background-color: #D30000;
            color: #FFF;
            border: white;
            padding: 10px 20px; /* Adjust the padding as needed */
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s, color 0.2s;
        }

        .remove-button:hover {
            background-color: #CD5C5C;
        }

        .checkout-button {
            background-color: #00ab41;
            color: white;
            border: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            float: right;
        }

        .checkout-button:hover {
            background-color: #00c04b;
        }

        .quantity-button {
            background-color: #02134F;
            color: #FFF;
            border: none;
            width: 30px;
            height: 30px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.1s, color 0.1s;
            margin: 0 5px; /* Add margin between buttons */
        }

        /* Style for the plus button */
        .plus {
            background-color: #808080;
        }

        .plus:hover {
            background-color: #999999;
        }

        /* Style for the minus button */
        .minus {
            background-color: #808080;
        }

        .minus:hover {
            background-color: #999999;
        }

        .quantity-button:hover {
            background-color: #808080;
            color: #000;
        }

        .quantity-input {
            width: 30px; 
            height: 30px; 
            text-align: center; 
        }

        @media screen and (max-width: 600px) {
            .addProductButtonMin button {
                width: 40%;
            }
        }
    </style>
</head>

<body>
    <nav class="topnav" id="myTopnav">
        <a href="../index.php" class="tab"><img src="../images/websiteElements/siteElements/electroholicsLogo.png"><b> ELECTROHOLICS </b></a>
        <a href="../index.php" class="tab"><b>HOME</b></a>
        <a href="processors.php" class="active"><b>PRODUCTS</b></a>
        <?php
            if (isset($_SESSION["accountID"])) {    // if a user is logged in and a session is active
                $accountID = $_SESSION["accountID"];
                $accountEmail = $_SESSION["accountEmail"];
                $username = $_SESSION["username"];
                $accountRole = $_SESSION["accountRole"];

                if ($accountRole == 1) {    // if the logged in user is an admin, show tabs available only to admin side
                    echo "<a href='../inventoryTrackingModule/#' class='tab'><b>STORE INVENTORY</b></a>";
                    echo "<a href='../userProfileAndAccountModule/myAccount.php' class='tab'><b><i class='fa fa-user-circle-o'></i> $username</b></a>";
                    echo "<a href='../userAuthenticationModule/logout.php' class='tabRight'><b>LOGOUT</b></a>";
                    // add more in the future as and when required
                }
                else if ($accountRole == 2) {   // otherwise, just show tabs available to the customer
                    echo "<a href='../shoppingCartModule/#' class='tab'><i class='fa fa-shopping-cart'><b></i> My Cart (# items)</b></a>";
                    echo "<a href='../userProfileAndAccountModule/myAccount.php' class='tab'><b><i class='fa fa-user-circle-o'></i> $username</b></a>";
                    echo "<a href='../userAuthenticationModule/logout.php' class='tabRight'><b>LOGOUT</b></a>";
                }
            }
            else {  // if a session is not active
                $accountRole = 0;   // assume that 0 means that the user is not logged in
                echo "<a href='../userAuthenticationModule/login.php' class='tabRight'><b>LOGIN</b></a>";
            }

        ?>
        <a href="javascript:void(0);" class="icon" onClick="adjustTopnav();"><i class="fa fa-bars"></i></a>
    </nav>
    
    <main>
    <h1>Shopping Cart</h1>
        <section class="cart">
            <div class="cart-item">
                <img src="product1.jpg" alt="Product 1">
                <div class="item-details">
                    <h2>Product 1</h2>
                    <p>Price: RM20.00</p>
                    <p>Quantity: </p>
                <div class="quantity-controls">
                    <button class="quantity-button minus">-</button>
                    <input type="number" class="quantity-input" value="1" disabled>
                    <button class="quantity-button plus">+</button>
                </div>
            </div>
                <button class="remove-button">Remove</button>
            </div>

            <div class="cart-item">
                <img src="product2.jpg" alt="Product 2">
                <div class="item-details">
                    <h2>Product 2</h2>
                    <p>Price: RM15.00</p>
                    <p>Quantity: </p>
                <div class="quantity-controls">
                    <button class="quantity-button minus">-</button>
                    <input type="number" class="quantity-input" value="1" disabled>
                    <button class="quantity-button plus">+</button>
                </div>
                </div>
                <button class="remove-button">Remove</button>
            </div>

            <div class="cart-total">
                <p>Total: RM55.00</p>
            </div>
            <button class="checkout-button">Checkout</button>
            
        </div>
        </section>
        
    </main>

    <footer>
        <h5>Chiew Cheng Yi | Christopher Wong Sen Li | Carl Brandon Valentine | Danny Mickenzie anak Reda</h5>
    </footer>

</body>

</html>