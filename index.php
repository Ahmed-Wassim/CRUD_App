    <?php include('header.php'); ?>
    <?php include('dbcon.php'); ?>

    <?php 
        if(isset($_GET['message'])){
    ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_GET['message']; ?>
    </div>
    <?php
        }
    ?>

    <?php 
        if(isset($_GET['update_msg'])){
    ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_GET['update_msg']; ?>
    </div>
    <?php
        }
    ?>

    <?php 
        if(isset($_GET['delete_msg'])){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_GET['delete_msg']; ?>
    </div>
    <?php
        }
    ?>


    <div class="container mt-5 pl-0 pr-0">
    <h2 class="float-left">ALL STUDENTS</h2>
    <button class="btn btn-primary float-right"  data-toggle="modal" data-target="#exampleModal">ADD STUDENT</button>
    </div>
    <table class="table  table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM `students`";

                $result = mysqli_query($Connection , $query);
                if(!$result){
                    die("connection error ....." . mysqli_connect_error());
                }else{
                    
                    while($data = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['First_Name']; ?></td>
                        <td><?php echo $data['Last_Name']; ?></td>
                        <td><?php echo $data['Age']; ?></td>
                        <td><a href="update_page.php?id=<?php echo $data['id']; ?>" class="btn btn-success">Update</a></td> 
                        <td><a href="delete_page.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                    }
                }
            ?>
            </tbody>
        </table>

        <!-- Modal -->
        <form action="insert_data.php" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENTS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control" required>
                </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success" name="send" value="ADD">
        </div>
        </div>
    </div>
    </div>
    </form>

        <?php include('footer.php'); ?>