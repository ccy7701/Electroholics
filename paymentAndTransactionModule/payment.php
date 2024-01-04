<?php
    session_start();
    include("../include/config.php");
    // Initialize any necessary variables for payment here
    // For example, retrieve cart items from session or database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Electroholics</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/catalogueStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../siteJavascript.js"></script>
    <!-- Add any additional CSS for the payment page here, if necessary -->
    <style>
        .name {
            padding-left: 5%;
            padding-right: 5%;
            text-align: center;
        }
        .checkout-table {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navigation bar from your catalog page -->
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
                $accountRole = 0;
                echo "<a href='../userAuthenticationModule/login.php' class='tabRight'><b>LOGIN</b></a>";
            }
        ?>
        <a href="javascript:void(0);" class="icon" onClick="adjustTopnav();"><i class="fa fa-bars"></i></a>
    </nav>

    <!-- Main content area -->
    <main style="flex: 1;">
        <div class="row">
            <!-- You can include a sidebar or remove it if not necessary for the payment page -->

            <div class="textBody">
                <!-- Payment form and details -->
                <h2 style="text-align: center;">Checkout</h2>

                <div class="name">
                    <form action="submitPayment.php" method="post">
                        <table class="checkout-table">
                            <?php
                                // for all the rows you find in the cart
                                // show them all
                                /*
                                    <tr>
                                        <th>Product Ordered</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                    <button>...</button>
                                */
                            ?>
                            <!-- Checkout box from your first code -->
                            <tr>
                                <th>Product Ordered</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                            <!-- Repeat rows for each product -->
                        </table>
                        <!-- End of checkout table -->

                        <button type="submit" class="button">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer from your catalog page -->
    <!-- ... -->

    <!-- Additional scripts if needed -->
</body>
</html>
