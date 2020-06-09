<?php
    if (!isset($_SESSION["loggedIn"])){
        header("location: inlog.php");
      }
?>