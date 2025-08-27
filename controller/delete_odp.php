<?php

//delete.php

include('controller.php');

if(isset($_POST["id"]))
{

    $query="DELETE FROM tbl_odp WHERE id_odp = '".$_POST['id']."'";
    $statement = $conn->prepare($query);
    $statement->execute();
}


?>