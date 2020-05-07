<?php
    if (!isset($_SESSION["loggedIn"])){
        header("location: index.php");
      }
?>