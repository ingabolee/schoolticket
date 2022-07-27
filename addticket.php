<?php
    include 'templates/student.php';
    include 'config.php';

    if(isset($_POST['submit'])){
        $User_id = $_SESSION["User_id"];
        $Ticket_title = $_POST['Ticket_title'];
        $Ticket_description = $_POST['Ticket_description'];
        $Department_id = $_POST['Department_id'];

        
    
        $sql = "INSERT INTO tickets (Ticket_title, Ticket_description, User_id, Department_id) 
                    VALUES ('$Ticket_title', '$Ticket_description', '$User_id', '$Department_id')";
    
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo '<script>window.location.replace("departments.php")</script>';
        }
    }

?>
<?php startblock('student') ?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">create new ticket</h6>
        <hr/>

        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <input class="form-control mb-3" type="text" placeholder="Ticket title" aria-label="default input example" name="Ticket_title" required>
                    <input class="form-control form-control-lg mb-3" type="text" placeholder="Description" aria-label=".form-control-lg example" name="Ticket_description" required>
                    <?php
                        $sql = "SELECT * FROM departments";

                        $rows = mysqli_query($conn, $sql);
                        
                    ?>
                    <h5>Associated Department</h5>
                    <div class="form-check">
                    <?php   while($row = mysqli_fetch_assoc($rows)):?>
                        <input class="form-check-input" type="radio" name="Department_id" id="<?php echo $row['Department_id']; ?>" value="<?php echo $row['Department_id']; ?>" required>
                        <label class="form-check-label" for="flexRadioDefault1"><?php echo $row['Department_name']; ?></label>
                    <?php  endwhile; ?>
                    </div>
                    <input class="btn btn-primary" type="submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>
<?php flushblocks(); ?>