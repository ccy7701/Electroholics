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

    
       body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .checkout-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #D9D9D9; /* Light gray background for the table */
        }
        .checkout-table th {
            background-color: #FFFFFF; /* Dark blue background for headers */
            color: black;
            padding: 10px;
            text-align: left;
        }

        .Shipping th {
            background-color: #FFFFFF; /* Dark blue background for headers */
            width: 5%;
            color: black;
            padding: 10px;
            text-align: left;
            align-items:center
           
        }

        .checkout-table .title {
            background-color: #000080; /* Navy blue background for the title cell */
            color: white;
            text-align: center;
            font-size: 24px;
        }
        .button {
        background-color: #008000; /* Suggested: Dark blue background to match the table headers */
        color: white; /* White text */
        }
</style>

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
               
                <br> <br>
                
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
                                <th class="title" colspan="5">Checkout</th>
                            </tr>
                            <tr>
                                <th>Product Ordered</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                            <!-- Repeat rows for each product -->
                            <tr>
                                <td>Shipping Option</td>
                                <td>Standard Delivery Received by: 9 Jan</td>
                                <td><button type="submit" class="button">Change Option</button></td> 
                                <td>Total Price</td>
                            </tr>
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