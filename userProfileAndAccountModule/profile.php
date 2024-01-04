<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Home | Electroholics</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="siteJavascript.js"></script>
    <style>
        .textBody {
            background-color: #444444;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            flex-direction: column;
            margin-left: 200px; /* Adjust this value to set the margin based on your topnavleft width */
            padding-left: 20px; /* Add padding to the left to separate content from topnavleft */
            padding-right: 20px;
            margin-top: 100px;
            margin-bottom: 100px;
        }
        .combined-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 100%;
            position: relative;
        }
        .text-container {
            width: 40%; /* Adjust as needed */
            text-align: center;
            padding: 20px;
            border: 1px solid #02134F; /* Add border properties */
            border-radius: 10px;
        }

        .border-container {
            width: 100%;
            background-color: #02134F;
            border: 5px;
            padding: 0%;
            box-sizing: border-box;
            z-index: 900;
            margin-bottom: 5px; /* Adjust as needed */
            position: relative;
        }
        .left-content {
            width: 15%; /* Adjust as needed */
            text-align: center;
            padding: 0px;
            border: 0px solid #02134F;
            border-radius: 10px;
            display: inline-block;
        }
        .right-content {
            width: 20%; /* Adjust as needed */
            text-align: center;
            padding: 0px;
            border: 0px solid #02134F;
            border-radius: 10px;
            display: inline-block;
        }

        .left-content {
            float: left;
            margin-right: 0px /* Adjust as needed */
        }

        .right-content {
            float: right;
            margin-left: 0px; /* Adjust as needed */
        }
        .left-content1 {
            width: 15%; /* Adjust as needed */
            text-align: center;
            padding: 0px;
            border: 0px solid #02134F;
            border-radius: 10px;
            display: inline-block;
            margin-left: 10px;
        }
        .right-content1 {
            width: 40%; /* Adjust as needed */
            text-align: center;
            padding: 0px;
            border: 0px solid #02134F;
            border-radius: 10px;
            display: inline-block;
            margin-right: 80px;
        }

        .left-content1 {
            float: left;
            margin-right: 0px /* Adjust as needed */
        }

        .right-content1 {
            float: right;
            margin-left: 0px; /* Adjust as needed */
        }

        .right-content a {
            color: #fff; /* Change 'yourColor' to the desired color code or name */
        }
        .indexTable1 {
            width: 100%;
            padding: 20px;
            border-collapse: collapse;
            border-bottom: #000000;
        }

        .circle {
            width: 150px;
            height: 150px;
            background-color: #fff;
            border-radius: 50%;
            overflow: hidden;
            margin: 40px 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            margin-top: 0px;
        }

        .circle img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .border {
            position: absolute;
            top: 100%; /* Adjust as needed */
            width: 100%;
            height: 500px; /* Adjust the height as needed */
            margin:  0; /* Adjust margin as needed */
            box-sizing: border-box;
            background-color: #ffffff;
        }

        .additional-border {
            margin-left: auto;
            margin-right: auto;
            width: 70%;
            height: 2px; /* Set the height of the additional border */
            background-color: #c5c5c5; /* Set the color of the additional border */
            margin-top: 120px; /* Adjust the margin-top value to control the space between the text and the additional border */
        }

        .border p{
            color: #000000;
            margin-left: 170px;
            margin-top: 100px;
            font-weight: bold;
        }

        main{
            background-color: #444444;
        }   
        @media screen and (max-width: 600px) {
            .textCenterAligned {
                padding: 0px;
            }

            .textBody {
                padding-left: 5%;
                padding-right: 5%;
                margin-left: 0; /* Adjust this value to remove margin on smaller screens */
            }
        }
    </style>
</head>

<body>

    <nav class="topnav" id="myTopnav">
        <a href="../index.php" class="tab"><img src="images/websiteElements/siteElements/electroholicsLogo.png"><b> ELECTROHOLICS </b></a>
        <a href="../index.php" class="active"><b>HOME</b></a>
        <a href="catalogueModule/processors.php" class="tab"><b>PRODUCTS</b></a>
        <?php
            if (isset($_SESSION["accountID"])) {    // if a user is logged in and a session is active
                $accountID = $_SESSION["accountID"];
                $accountEmail = $_SESSION["accountEmail"];
                $username = $_SESSION["username"];
                $accountRole = $_SESSION["accountRole"];

                if ($accountRole == 1) {    // if the logged in user is an admin, show tabs available only to admin side
                    echo "<a href='inventoryTrackingModule/storeInventory.php' class='tab'><b>STORE INVENTORY</b></a>";
                    echo "<a href='userProfileAndAccountModule/profile.php' class='tab'><b><i class='fa fa-user-circle-o'></i> $username</b></a>";
                    echo "<a href='userAuthenticationModule/logout.php' class='tabRight'><b>LOGOUT</b></a>";
                    // add more in the future as and when required
                }
                else if ($accountRole == 2) {   // otherwise, just show tabs available to the customer
                    echo "<a href='shoppingCartModule/#' class='tab'><i class='fa fa-shopping-cart'><b></i> My Cart (# items)</b></a>";
                    echo "<a href='userProfileAndAccountModule/profile.php' class='tab'><b><i class='fa fa-user-circle-o'></i> $username</b></a>";
                    echo "<a href='userAuthenticationModule/logout.php' class='tabRight'><b>LOGOUT</b></a>";
                }
            }
            else {  // if a session is not active
                echo "<a href='userAuthenticationModule/login.php' class='tabRight'><b>LOGIN</b></a>";
            }

        ?>
        <a href="javascript:void(0);" class="icon" onClick="adjustTopnav();"><i class="fa fa-bars"></i></a>
    </nav>


    <main>
        <div class="textBody">
            <div class="combined-container">
                <div class="border-container">
                    <div class="left-content">
                        <p>ID</p>
                    </div>
                    <div class="right-content">
                        <a href="index.php"><p>Edit Profile</p></a>
                    </div>
                    <div class="border">
                        <div class="left-content1">
                            <p>Name</p>
                        </div>
                        <div class="right-content1">
                            <p>Kafuu Chino</p>
                        </div>
                        <div class="additional-border">
                        </div>
                    </div>
                </div>
                <div class="circle">
                    <!-- Add your image source here -->
                    <img src="../images/profilePictures/profile.jpeg" alt="Image">
                </div>    
            </div> 
        </div>
    </main>
</body>

</html>
