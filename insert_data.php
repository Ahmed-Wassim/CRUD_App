<?php 
include('dbcon.php');
if(isset($_POST['send'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];

    $query = "INSERT INTO `students` (`First_Name`, `Last_Name`, `Age`) VALUES ('$fname', '$lname', '$age')";

    $result = mysqli_query($Connection,$query);
    if(!$result){
        die("Query Failed ..." . mysqli_connect_error());
    }else{
        header('location:index.php?message=Your data has been added successfully');
    }
}

?>