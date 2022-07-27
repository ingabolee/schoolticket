<?php
    include 'templates/admin.php';
    include 'config.php';


    $Department_id = $_GET["id"];
    $sql = "SELECT * FROM departments WHERE Department_id = '$Department_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){
        $Department_name = $_POST['Department_name'];
        $Department_description	 = $_POST['Department_description'];
    
        $sql = "UPDATE departments SET Department_name='$Department_name', Department_description='$Department_description' WHERE Department_id = '$Department_id'";
    
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo '<script>window.location.replace("departmentsadmin.php")</script>';
        }
    }

?>

<?php startblock('Admin') ?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Edit department</h6>
        <hr/>
        <form action="" method="post">
            <div class="card">
                <div class="card-body">
                    <input class="form-control mb-3" type="text" placeholder="Department name" aria-label="default input example" name="Department_name"  value="<?php echo $row['Department_name'];?>">
                    <input class="form-control form-control-lg mb-3" type="text" placeholder="Description" aria-label=".form-control-lg example" name="Department_description" value="<?php echo $row['Department_description'];?>">
                    <input class="btn btn-primary" type="submit" name="submit">
                    <a href="departmentsadmin.php" class="btn btn-warning">Cancel</a>
                </div>
            </div>
        </form>
        
    </div>
</div>
<?php endblock() ?>
<?php flushblocks(); ?>