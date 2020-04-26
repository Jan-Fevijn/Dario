<?php
include "conn.php";
session_destroy();
header("location: inlog.php");
?>