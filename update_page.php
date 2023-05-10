<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                
                $query = "SELECT * FROM `students` WHERE `id` = $id";

                $result = mysqli_query($Connection , $query);
                if(!$result){
                    die("connection error ....." . mysqli_connect_error());
                }
                else{
                    $row = mysqli_fetch_assoc($result);
                }
            }
        ?>

        <?php
            if(isset($_POST['update_data'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $age = $_POST['age'];

                $query = "UPDATE `students` SET `First_Name` = '$fname' , `Last_Name` = '$lname' , `Age` = $age  WHERE `id` = $id";

                $result = mysqli_query($Connection , $query);
                if(!$result){
                    die("connection error ....." . mysqli_connect_error());
                }else{
                    header("location:index.php?update_msg=You have successfully updated the data");
                }
            }

        ?>


    <form action="update_page.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" class="form-control" value="<?php echo $row['First_Name']; ?>" >
            </div>
            <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" class="form-control" value="<?php echo $row['Last_Name']; ?>">
            </div>
            <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control" value="<?php echo $row['Age']; ?>">
            </div>
            <input type="submit" class="btn btn-success" name="update_data" value="UPDATE">
    </form>




<?php include('footer.php'); ?>