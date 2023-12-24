<?php
    session_start();
?>

<!DOCTYPE HTML>
<html lang="en">

<html>

<head>
    <title>Home | Electroholics</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="siteJavascript.js"></script>
    <style>
        .blurredBackgroundContainer {
            position: relative;
            text-align: center;
            color: #FFFFFF;
            height: 500px;
        }
        .textCenterAligned {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 50px;
        }
        .textBody {
            background-color: #444444;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            flex-direction: column;
            padding-left: 20%;
            padding-right: 20%;
        }
        .indexTable {
            width: 100%;
            padding: 20px;
            border-collapse: collapse;
        }
        .indexTable th {
            background-color: #02134F;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .indexTable td {
            background-color: #D9D9D9;
            padding: 10px;
            text-align: center;
            box-sizing: border-box;
            color: #000000;
            transition: background-color 0.1s, color 0.1s;
        }
        .indexTable td:hover {
            background-color: #FAF0E6;
        }
        .tableImage {
            width: 80%;
        }
        @media screen and (max-width: 600px) {
            .textCenterAligned {
                padding: 0px;
            }
            .textBody {
                padding-left: 5%;
                padding-right: 5%;
            }
        }
    </style>
</head>

<body>
    <nav class="topnav" id="myTopnav">
        <a href="#" class="tab"><img src="images/electroholicsLogo.png"><b> ELECTROHOLICS </b></a>
        <a href="index.php" class="active"><b>HOME</b></a>
        <a href="products.php" class="tab"><b>PRODUCTS</b></a>
        <a href="myaccount.php" class="tab"><b>MY ACCOUNT</b></a>
        <a href="userAuthenticationModule/login.php" class="login"><b>LOGIN</b></a>
        <a href="javascript:void(0);" class="icon" onClick="adjustTopnav();"><i class="fa fa-bars"></i></a>
    </nav>

    <main>
        <div class="blurredBackgroundContainer">
            <img src="images/indexBackground1.png" alt="pcBuild" style="width: 100%; height: 500px; object-fit: cover;">
            <div class="textCenterAligned">
                <img src="images/electroholicsLogo.png" alt="Logo" style="width: 40%; height: 40%;">
                <b><i>
                <p>Welcome to Electroholics, where technology meets passion!</p>
                <p>At Electroholics, We're more than just a PC store, we're a community of tech
                enthusiasts dedicated to fueling your love for all things electronic.</p>
                <p>Shop with us now!</p>
                </i></b>
            </div>
        </div>
        <div class="textBody">
            <br>
            <table class="indexTable" id="tableFeaturedProducts">
                <tr>
                    <th colspan=3>Featured Products >></th>
                </tr>
                <tr>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                </tr>
                <tr>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                </tr>
            </table>
            <br>
            <table class="indexTable" id="tableMostPopularBuilds">
                <tr>
                    <th colspan=3>Most Popular Builds >></th>
                </tr>
                <tr>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                </tr>
                <tr>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                    <td>
                        <img class="tableImage" src="images/placeholder.png"><br>
                        Product Name
                    </td>
                </tr>
            </table>
            <br>
        </div>
    </main>
    
    <footer>
        <h5>Chiew Cheng Yi | Christopher Wong Sen Li | Carl Brandon Valentine | Danny Mickenzie anak Reda</h5>
    </footer>
</body>

</html>