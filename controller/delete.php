<?php

//delete.php

include('controller.php');

if(isset($_POST["username_fal"]))
{

    $query="DELETE FROM tbl_fal WHERE username_fal = '".$_POST['username_fal']."'";
    $statement = $conn->prepare($query);
    $statement->execute();
}


?>