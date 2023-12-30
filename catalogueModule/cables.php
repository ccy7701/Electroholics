<?php
    session_start();
?>

<!DOCTYPE HTML>
<html lang="en">

<html>
<head>
    <title>Catalogue | Electroholics</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="siteJavascript.js"></script>

    <style>
        

        .verticalMenu {
            background-color: #333;
            color: #fff;
            width: 225px;
            overflow-y: auto;
            height: 100.4vh;
            float: left; /* Add this property to float it to the left */
            
        }

        .verticalMenu ul {
            list-style-type: none;
            padding: 0;
        }

        .verticalMenu ul li {
            margin: 0;
            padding: 0;
        }

        .verticalMenu ul li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s;
            font-size: 18px;
        }

        .verticalMenu ul li a:hover {
            background-color: #555; /* Adjust the hover background color as desired */
        }

        .verticalMenu a.active {
            background-color: #555; /* Highlighted background color */
            color: #fff; /* Highlighted text color */
        }

        .search-wrapper{
            text-align: center;
            
        }

        .textBody {
            background-color: #444444;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            flex-direction: column;
            padding-left: 15%;
            padding-right: 15%;
            padding-top: 50px;
            height: 96.6vh;
            
        }
        .indexTable {
            width: 100%;
            padding: 20px;
            border-collapse: collapse;
        }
        .indexTable th {
            background-color: #02134F;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .indexTable td {
            background-color: #D9D9D9;
            padding: 50px;
            text-align: center;
            box-sizing: border-box;
            color: #000000;
            transition: background-color 0.1s, color 0.1s;
        }

        .indexTable td:hover {
            background-color: #FAF0E6;
        }

        .tableImage {
            width: 40%;
            padding: 10px;
        }

        

        @media screen and (max-width: 600px) {
            .textCenterAligned {
                padding: 0px;
            }
            .textBody {
                padding-left: 5%;
                padding-right: 5%;
            }

            .verticalMenu {
                display: none;
            }
        }
    </style>
</head>

<body>
    <nav class="topnav" id="myTopnav">
        <a href="../index.php" class="tab"><img src="../images/websiteElements/electroholicsLogo.png"><b> ELECTROHOLICS </b></a>
        <a href="../index.php" class="tab"><b>HOME</b></a>
        <a href="catalogueModule/processors.php" class="active"><b>PRODUCTS</b></a>
        <?php
            if (isset($_SESSION["accountID"])) {    // if a user is logged in and a session is active
                $accountID = $_SESSION["accountID"];
                $accountEmail = $_SESSION["accountEmail"];
                $username = $_SESSION["username"];
                $accountRole = $_SESSION["accountRole"];

                if ($accountRole == 1) {    // if the logged in user is an admin, show tabs available only to admin side
                    echo "<a href='inventoryTrackingModule/#' class='tab'><b>STORE INVENTORY</b></a>";
                    echo "<a href='userProfileAndAccountModule/myAccount.php' class='tab'><b><i class='fa fa-user-circle-o'></i> $username</b></a>";
                    echo "<a href='userAuthenticationModule/logout.php' class='tabRight'><b>LOGOUT</b></a>";
                    // add more in the future as and when required
                }
                else if ($accountRole == 2) {   // otherwise, just show tabs available to the customer
                    echo "<a href='shoppingCartModule/#' class='tab'><i class='fa fa-shopping-cart'><b></i> My Cart (# items)</b></a>";
                    echo "<a href='userProfileAndAccountModule/myAccount.php' class='tab'><b><i class='fa fa-user-circle-o'></i> $username</b></a>";
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
    <div>
        <div class="verticalMenu">
            <ul>
                <li>
                    <div class="search-wrapper">
                        <input type="search" id="search" placeholder=" Search " style="width: 180px; height: 40px; font-size: 16px; ">
                        <i class="fa fa-search"></i>
                    </div>
                </li>
                <br>
                <li><a href="../catalogueModule/processors.php">Processors (CPUs)</a></li>
                <li><a href="../catalogueModule/motherboards.php">Motherboards</a></li>
                <li><a href="../catalogueModule/gpu.php">Graphics Cards (GPUs)</a></li>
                <li><a href="../catalogueModule/ram.php">Memory (RAM)</a></li>
                <li><a href="../catalogueModule/ssd.php">Storage Drives (SSDs and HDDs)</a></li>
                <li><a href="../catalogueModule/psu.php">Power Supplies (PSUs)</a></li>
                <li><a href="../catalogueModule/cases.php">Cases and Cooling</a></li>
                <li><a href="../catalogueModule/cables.php" class="active">Cables and Connectors</a></li>
            </ul>
            </div>

        <div class="textBody">
            <br>
            <table class="indexTable" id="tableFeaturedProducts">
                <tr>
                    <th colspan=3 style="font-size: 30px;">Cables and Connectors</th>
                </tr>
                <tr>
                    <td>
                        <img class="tableImage" src="../images/websiteElements/catalogueIMGs/cables/atxcable.png"><br>
                        Bitfenix Sleeved 45cm Blue/Black 24-pin ATX ext Cable
                        <br>
                        <br>
                        <b>RM2</b>
                    </td>
                    <td>
                        <img class="tableImage" src="../images/websiteElements/catalogueIMGs/cables/dpcable.png"><br>
                        Orico XD-DPDT4 DP (M) to DP (M) Version 1.2 4K Adapter Cable - 3M
                        <br>
                        <br>
                        <b>RM33</b>
                    </td>
                    <td>
                        <img class="tableImage" src="../images/websiteElements/catalogueIMGs/cables/videocardcable.png"><br>
                        Bitfenix Sleeved 45cm Blue/Black 8-pin video card ext cable 
                        <br>
                        <br>
                        <b>RM2</b>
                    </td> 
                </tr>
            </table>
            <script>
            function filterProducts() {
                var searchInput = document.getElementById("search").value.toLowerCase();
                var productContainers = document.querySelectorAll(".textBody .indexTable td");

            for (var i = 0; i < productContainers.length; i++) {
                var product = productContainers[i].textContent.toLowerCase();

            if (searchInput === "" || product.indexOf(searchInput) !== -1) {
                productContainers[i].style.display = "block";
            } else {
                productContainers[i].style.display = "none";
        }
    }

        // Check if the search input is empty and refresh the page if it is
        if (searchInput === "") {
            location.reload(); // This will refresh the page
        }
    }

    document.getElementById("search").addEventListener("input", filterProducts);
    </script>
            <br>
        </div>
    </div>
    </main>
    
    <footer>
        <h5>Chiew Cheng Yi | Christopher Wong Sen Li | Carl Brandon Valentine | Danny Mickenzie anak Reda</h5>
    </footer>
</body>

</html>