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
    <style>
        .addProductButtonMin {
            text-align: center;
        }
        .addProductButtonMin button {
            background-color: #02134F;
            color: #FFF;
            width: 30%;
            height: 40px;
            font-size: 18px;
            border: 1px solid #666666;
            transition: background-color 0.1s, color 0.1s;
        }
        .addProductButtonMin button:hover {
            background-color: #FFFFFF;
            color: #000;
            cursor: pointer;
        }

        /* Reset some default styles */
body, h1, h2, p {
    margin: 0;
    padding: 0;
}

/* Style the header */
header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}

.product-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.product-image {
    flex: 1;
    padding: 20px;
    text-align: center;
}

.product-image img {
    max-width: 100%;
    height: auto;
    border: 1px solid #ccc;
    padding: 10px;
}

.product-info {
    flex: 2;
    padding: 20px;
}

.product-info h1 {
    font-size: 28px;
    margin-bottom: 10px;
}

.product-info p {
    font-size: 18px;
    margin-bottom: 10px;
}

.add-to-cart {
    text-align: left;
}

.add-to-cart button {
    background-color: #02134F;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 22px;
    cursor: pointer;
    transition: background-color 0.2s, color 0.2s;
}

.add-to-cart button:hover {
    background-color: #d4af37;
}

/* Style the product description section */
.product-description {
    margin-top: 20px;
}

.product-description h2 {
    font-size: 20px;
    margin-bottom: 10px;
}

.product-description p {
    font-size: 16px;
    line-height: 1.5;
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
                    echo "<a href='../inventoryTrackingModule/storeInventory.php' class='tab'><b>STORE INVENTORY</b></a>";
                    echo "<a href='../userProfileAndAccountModule/profile.php' class='tab'><b><i class='fa fa-user-circle-o'></i> $username</b></a>";
                    echo "<a href='../userAuthenticationModule/logout.php' class='tabRight'><b>LOGOUT</b></a>";
                    // add more in the future as and when required
                }
                else if ($accountRole == 2) {   // otherwise, just show tabs available to the customer
                    // query for customer's cart
                    $cartQuery = "
                        SELECT COUNT(item_order.cartID) AS numberOfCartItems FROM item_order
                        JOIN cart on item_order.cartID = cart.cartID
                        JOIN user_profile ON cart.userID = user_profile.userID
                        WHERE user_profile.accountID = '$accountID' AND cart.isActive = 1;
                    ";
                    $result = mysqli_query($conn, $cartQuery);
                    $row = mysqli_fetch_assoc($result);
                    $numberOfCartItems = $row["numberOfCartItems"];

                    echo "<a href='../shoppingCartModule/cart.php' class='tab'><i class='fa fa-shopping-cart'><b></i> My Cart ($numberOfCartItems items)</b></a>";
                    echo "<a href='../userProfileAndAccountModule/profile.php' class='tab'><b><i class='fa fa-user-circle-o'></i> $username</b></a>";
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

    <main style="flex: 1;">
        <div class="row">
            <div class="verticalMenu">
                <ul>
                    <li>
                        <div class="search-wrapper">
                            <input type="search" id="search" placeholder=" Search " style="width: 80%; height: 40px; font-size: 16px; ">
                            <i class="fa fa-search"></i>
                        </div>
                    </li>
                    <br>
                    <div id="category-links">
                        <li><a href="../catalogueModule/processors.php" class="active">Processors (CPUs)</a></li>
                        <li><a href="../catalogueModule/motherboards.php">Motherboards</a></li>
                        <li><a href="../catalogueModule/gpu.php">Graphics Cards (GPUs)</a></li>
                        <li><a href="../catalogueModule/ram.php">Memory (RAM)</a></li>
                        <li><a href="../catalogueModule/ssd.php">Storage Drives (SSDs and HDDs)</a></li>
                        <li><a href="../catalogueModule/psu.php">Power Supplies (PSUs)</a></li>
                        <li><a href="../catalogueModule/cases.php">Cases and Cooling</a></li>
                        <li><a href="../catalogueModule/cables.php">Cables and Connectors</a></li>
                    </div>
                </ul>
            </div>

            <div class="product-details">
            <div class="product-image">
                <img src="product_image_url" alt="Product Image">
            </div>
            <div class="product-info">
                <h1>Product Name</h1>
                <p><strong>Product Description</strong></p>
                <p><strong>Price:</strong> RM XXX.XX</p>
                <p><strong>Brand:</strong> Product Brand</p>
                <p><strong>Category:</strong> Product Category</p>
                <p><strong>Availability:</strong> In Stock</p>
                <div class="add-to-cart">
                    <button>Add to Cart</button>
                </div>
            </div>
        </div>
            
    </main>

    <footer>
        <h5>Chiew Cheng Yi | Christopher Wong Sen Li | Carl Brandon Valentine | Danny Mickenzie anak Reda</h5>
    </footer>

</body>

</html>