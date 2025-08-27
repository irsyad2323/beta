<?php

//delete.php

include('controller.php');

if(isset($_POST["id"]))
{

    $query="DELETE FROM tbl_gamas WHERE id = '".$_POST['id']."'";
    $statement = $conn->prepare($query);
    $statement->execute();
}


?>