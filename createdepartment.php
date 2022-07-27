<?php
    include 'templates/admin.php';
    include 'config.php';

    if(isset($_POST['submit'])){
        $Department_name = $_POST['Department_name'];
        $Department_description	 = $_POST['Department_description'];
        $User_firstname = $_POST['User_firstname'];
        $User_middlename = $_POST['User_middlename'];
        $User_lastname = $_POST['User_lastname'];
        $User_email = $_POST['User_email'];
        $User_phone = $_POST['User_phone'];


        $sql = "SELECT * FROM user WHERE User_phone = '$User_phone'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows > 0){
            echo "<p>Phone number already exists</p>";
        }
        else{
            //login table
            $sql = "INSERT INTO user (User_firstname, User_middlename, User_lastname, User_email, User_phone, Role_id) 
            VALUES ('$User_firstname', '$User_middlename', '$User_lastname', '$User_email', '$User_phone', '3')";
            $result = mysqli_query($conn, $sql);

            $sql = "SELECT * FROM user WHERE User_phone = '$User_phone'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $User_id = $row['User_id'];

    
            $sql = "INSERT INTO departments (Department_name, Department_description, Department_user_id) 
                        VALUES ('$Department_name', '$Department_description', '$User_id')";
    
            $result = mysqli_query($conn, $sql);
            if ($result){
                
                echo '<script>window.location.replace("departmentsadmin.php")</script>';
            }
        }
    }

?>

<?php startblock('Admin') ?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Add new department</h6>
        <hr/>
        <form action="" method="post">
            <div class="card">
                <div class="card-body">
                    <input class="form-control mb-3" type="text" placeholder="Department name" aria-label="default input example" name="Department_name" required>
                    <input class="form-control form-control-lg mb-3" type="text" placeholder="Description" aria-label=".form-control-lg example" name="Department_description" required>
                    
                    <hr>
                    <h5>Department User</h5>
                    <hr>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="inputFirstName" name="User_firstname" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="inputFirstName" name="User_middlename" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="inputLastName" name="User_lastname" required>
                    </div>
                    <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" name="User_email" required>
                    </div>

                    <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="inputEmailAddress" placeholder="+254XXXXXXXXX" name="User_phone" required>
                    </div>
                    <input class="btn btn-primary" type="submit" name="submit">
                </div>
            </div>
        </form>
        
    </div>
</div>
<?php endblock() ?>
<?php flushblocks(); ?>