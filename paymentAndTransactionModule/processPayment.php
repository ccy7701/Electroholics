<?php
    session_start();
    include("../include/config.php");
?>

<!DOCTYPE HTML>
<html lang="en">

<html>

<head>
    <title>Process Payment</title>
    <script src="../siteJavascript.js"></script>
</head>

<body>
    <?php
        if (isset($_SESSION["accountID"])) {
            $accountID = $_SESSION["accountID"];
            
            // STEP 1: Add a new row to order_receipt with the current cart
            $addOrderReceiptQuery = "
                INSERT INTO order_receipt (cartID, paymentAmount)
                SELECT cartID, totalCost
                FROM cart
                JOIN user_profile ON user_profile.userID = cart.userID
                JOIN account ON account.accountID = user_profile.accountID
                WHERE account.accountID = '$accountID' AND cart.isActive = 1;
            ";

            // STEP 2: Update the status of this cart, make it 'completed' as in isActive from 1 to 0
            $changeCartStatusQuery = "
                UPDATE cart
                SET isActive = 0
                WHERE cart.userID IN (
                    SELECT user_profile.userID
                    FROM user_profile
                    JOIN account ON account.accountID = user_profile.accountID
                    WHERE account.accountID = '$accountID'
                )
                AND cart.isActive = 1;
            ";

            // STEP 3: Create a new cart for the account, make that one active
            $createNewCartQuery = "
                INSERT INTO cart (userID, totalCost, isActive)
                SELECT user_profile.accountID, 0.00, 1
                FROM user_profile
                JOIN account ON user_profile.accountID = account.accountID
                WHERE user_profile.accountID = '$accountID'
            ";

            // if all three queries work together
            if (mysqli_query($conn, $addOrderReceiptQuery) && mysqli_query($conn, $changeCartStatusQuery) && mysqli_query($conn, $createNewCartQuery)) {
                echo "
                    <script>
                        popup(\"Order successful.\", \"../userProfileAndAccountModule/profile.php\");
                    </script>
                ";
            }
            else {
                echo "
                    <script>
                        popup(\"ERROR: ".mysqli_error($conn)."\", \"payment.php\");
                    </script>
                ";
            }
        }
    ?>
</body>

</html>