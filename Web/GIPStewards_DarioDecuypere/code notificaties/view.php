<h1>Notifications</h1>

<?php
    include 'security.php';
    include("classnotificaties.php");

    $id = $_GET['id'];

    $query ="UPDATE `notificaties` SET `status` = 'read' WHERE `idnotificaties` = $id;";
    performQuery($query);

    $query = "SELECT * from `notificaties` where `idnotificaties` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='update'){
                echo ucfirst($i['naam'])." update in schema. <br/>".$i['date'];
            }else{
                echo "extra shift.<br/>".$i['insert'];
            }
        }
    }
    
?><br/>
<a href="times.php">Back</a>