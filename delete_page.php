<?php include('dbcon.php'); ?>


<?php

if(isset($_GET['id'])){
    $id =$_GET['id'];
    $query = "DELETE FROM `students` WHERE `id` = $id";

    $result = mysqli_query($Connection , $query);

    if(!$result){
        die("Query Failed" . mysqli_connect_error());
    }
    else{
        header("location:index.php?delete_msg=You have Deleted The Student!");
    }
}

?>