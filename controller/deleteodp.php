<?php

//delete.php

include('controller.php');

if(isset($_POST["key_fal"]))
{

    $query="DELETE FROM tbl_maintenance_odp WHERE key_fal = '".$_POST['key_fal']."'";
    $statement = $conn->prepare($query);
    $statement->execute();
}


?>