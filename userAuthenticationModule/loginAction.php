<?php
    session_start();
    include("../include/config.php");
?>

<!DOCTYPE HTML>
<html lang="en">

<html>

<head>
    <title>Login Action | Electroholics </title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../siteJavascript.js"></script>
</head>

<body>
    <?php
        // populate the variables based on data obtained from form
        $loginType = $_POST["loginType"];
        $loginUsernameOrEmail = $_POST["loginUsernameOrEmail"];
        $loginPassword = $_POST["loginPassword"];

        $loginQuery = "SELECT * FROM account WHERE accountEmail=".$loginUsernameOrEmail." OR username=".$loginUsernameOrEmail." LIMIT 1;";
        $result = mysqli_query($conn, $loginQuery);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // verify for matching passwords
            if (password_verify($_POST["loginPassword"], $row["accountPassword"])) {
                echo "Login was successful.";
                // bind the current session to the account row
                $_SESSION["UID"] = $row["accountID"];
                $_SESSION["userName"] = $row["username"];
                $_SESSION["loginTime"] = time();
                header("location:../index.php");
            }
            else {
                echo "Login error: Username/email and password do not match. Please try again.";
            }
        }
        else {
            echo "Login error: No user with this username/email exists. Please try again.";
        }
        mysqli_close($conn);
    ?>
</body>

</html>