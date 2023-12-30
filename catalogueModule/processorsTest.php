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
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .verticalMenu {
            background-color: #333;
            color: #fff;
            width: 15%; /* percentage instead of 225px, cause then it can resize dynamically */
            overflow-y: auto;
            min-height: 100vh;
            float: left;
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
            color: #fff;            /* Highlighted text color */
        }

        .search-wrapper {
            text-align: center;
        }

        .textBody {
            background-color: #444444;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            flex-direction: column;
            padding-left: 12%;
            padding-right: 12%;
            /* padding-top: 50px; */    /* replaced this with percentage, scales better */
            min-height: 100vh;
            flex: 2;                    /* see lab tutorials for this one */
            width: 85%;
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
            width: 33.33%;
            padding-left: 5%;
            padding-right: 5%;  /* a more uniform and scalable padding */
            padding-top: 2%;
            padding-bottom: 2%;
            /* padding: 50px; */
            text-align: center;
            box-sizing: border-box;
            color: #000000;
            transition: background-color 0.1s, color 0.1s;
        }

        .indexTable td:hover {
            background-color: #FAF0E6;
        }

        .indexTable td p {
            display: block;
            padding-top: 5%;
        }

        .tableImage {
            width: 50%;                 /* increased width from 40% to 50% */
            padding-left: 5%;
            padding-right: 5%;
        }

        @media screen and (max-width: 960px) {
            .verticalMenu {
                width: 30%;
            }
            .textBody {                 /* reduce padding so everything can still fit */
                width: 70%;
                padding-left: 5%;
                padding-right: 5%;
            }
            .indexTable td {
                padding: 2%;
            }
        }

        @media screen and (max-width: 600px) {
            #category-links {
                display: none;
            }
            .verticalMenu {
                width: 100%;
                padding: 0;
                min-height: 0;
                display: flex;
                float: center;
            }
            .verticalMenu ul {
                padding-top: 20px;
                margin: 0;
            }
            .textBody {
                flex: none;
                box-sizing: border-box;
                width: 100%;
            }
        }

    </style>
</head>

<body>
    <nav class="topnav" id="myTopnav">
        <a href="../index.php" class="tab"><img src="../images/websiteElements/electroholicsLogo.png"><b> ELECTROHOLICS </b></a>
        <a href="../index.php" class="tab"><b>HOME</b></a>
        <a href="processors.php" class="active"><b>PRODUCTS</b></a>
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
                    echo "<a href='../userAuthenticationModule/logout.php' class='tabRight'><b>LOGOUT</b></a>";
                }
            }
            else {  // if a session is not active
                echo "<a href='userAuthenticationModule/login.php' class='tabRight'><b>LOGIN</b></a>";
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

            <div class="textBody">
                <br>
                <table class="indexTable" id="tableFeaturedProducts">
                    <tr>
                        <th colspan=3 style="font-size: 30px;">Processors</th>
                    </tr>
                    <tr>
                        <td>
                            <img class="tableImage" src="../images/websiteElements/catalogueIMGs/cpu/LGA1200.png"><br>
                            <p>Intel Core i5 10500 6 Cores/12 Threads 3.1/4.5Ghz LGA1200 CPU Processor</p>
                            <p><b>RM705</b></p>
                        </td>
                        <td>
                            <img class="tableImage" src="../images/websiteElements/catalogueIMGs/cpu/LGA1700.png"><br>
                            <p>Intel Core i5 12600 6 Cores/12 Threads 3.3/4.8 GHz LGA1700 CPU Processor</p>
                            <p><b>RM1285</b></p>
                        </td>
                        <td>
                            <img class="tableImage" src="../images/websiteElements/catalogueIMGs/cpu/LGA1700i7.png"><br>
                            <p>Intel Core i7 13700F 16 Cores/24 Threads 2.1/5.2GHz LGA1700 CPU Processor</p>
                            <p><b>RM1709</b></p>
                        </td> 
                    </tr>
                    <tr>
                        <td>
                            <img class="tableImage" src="../images/websiteElements/catalogueIMGs/cpu/Ryzen55600.png"><br>
                            <p>AMD Ryzen 5 5600 6 Core/12 Threads 3.9/4.4GHz AM4 CPU Processor 100-100000927BOX</p>
                            <p><b>RM819</b></p>
                        </td>
                        <td>
                            <img class="tableImage" src="../images/websiteElements/catalogueIMGs/cpu/Ryzen75700G.png"><br>
                            <p>AMD Ryzen 7 5700G 8 Core/16 Threads 3.8/4.6GHz AM4 CPU Processor 100-100000263BOX</p>
                            <p><b>RM1249</b></p>
                        </td>
                        <td>
                            <img class="tableImage" src="../images/websiteElements/catalogueIMGs/cpu/Ryzen95900X.png"><br>
                            <p>AMD Ryzen 9 5900X 12 Core/24 Threads 3.7/4.8GHz AM4 CPU Processor 100-100000061WOF</p>
                            <p><b>RM2299</b></p>
                        </td> 
                    </tr>
                </table>

                <script type="text/javascript">
                    // this is the JS Chris used to filter the products
                    function filterProducts() {
                        var searchInput = document.getElementById("search").value.toLowerCase();
                        var productContainers = document.querySelectorAll(".textBody .indexTable td");

                        // store the original table style first
                        var originalTableStyle = [];
                        for (var i = 0; i < productContainers.length; i++) {
                            originalTableStyle.push({
                                display: "table-cell",
                                width: "33.33%",
                            });
                        }

                        for (var i = 0; i < productContainers.length; i++) {
                            var product = productContainers[i].textContent.toLowerCase();
                            if (searchInput === "" || product.indexOf(searchInput) !== -1) {
                                productContainers[i].style.display = "block";
                                productContainers[i].style.width = "100.00%";
                            }
                            else {
                                productContainers[i].style.display = "none";
                            }
                        }

                        // Check if the search input is empty and refresh the page if it is
                        // if (searchInput === "") {
                        //     location.reload();  // This will refresh the page
                        // }

                        // New check: if search input is empty, display all in that category
                        if (searchInput === "") {
                            for (var j = 0; j < productContainers.length; j++) {
                                productContainers[j].style.display = originalTableStyle[j].display;
                                productContainers[j].style.width = originalTableStyle[j].width;
                            }
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