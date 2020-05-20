<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["code"])){
        $sql = "SELECT wwResetCode FROM steward where wwResetCode = '". $_SESSION["CodeReset"] ."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    header('location: wwNieuw.php');
                }
            } else {
                header('location: wwCode.php');
            }
}
}
?>