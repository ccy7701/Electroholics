<?php
    session_start();
    if (isset($_SESSION["UID"])) {
        unset($_SESSION["UID"]);
        unset($_SESSION[""]);   // unset what though
        header("location: index.php");
    }
?>