<?php
    include 'templates/department.php';
    include 'config.php';

$Ticket_id = $_GET["id"];
$sql = "SELECT * FROM tickets WHERE Ticket_id  = '$Ticket_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$Ticket_title = $row['Ticket_title'];
$Ticket_description = $row['Ticket_description'];

if(isset($_POST['submit'])){
    $Ticket_status_description = $_POST['Ticket_status_description'];

    $sql = "INSERT INTO ticket_status (Ticket_status_description, Ticket_id) 
                VALUES ('$Ticket_status_description', '$Ticket_id')";

    $result = mysqli_query($conn, $sql);
    if ($result){
        $sql = "SELECT * FROM ticket_status WHERE Ticket_id = '$Ticket_id' AND Ticket_status_description = '$Ticket_status_description'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $Ticket_status_id = $row['Ticket_status_id'];

        $sql = "INSERT INTO ticket_history (Ticket_status_id, Ticket_id) 
                VALUES ('$Ticket_status_id', '$Ticket_id')";

        $result = mysqli_query($conn, $sql);
        if ($result){
        echo '<script>window.location.replace("departmentticket.php")</script>';
        }

    }
}



?>

<?php startblock('department') ?>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container py-2">
                <h4 class="font-weight-light text-center text-muted py-3"><?php echo $Ticket_title; ?></h4>
                <div class="row">
                    <!-- timeline item 1 left dot -->
                    <div class="col-auto text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                        <span class="badge rounded-pill bg-primary">&nbsp;</span>
                    </h5>
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <!-- timeline item 1 event content -->
                    <div class="col py-2">
                        <div class="card radius-15">
                            <div class="card-body">
                                <p class="card-text"><?php echo $Ticket_description; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $sql = "SELECT * FROM ticket_status WHERE Ticket_id = '$Ticket_id'";
                $result = mysqli_query($conn, $sql);
                
                ?>
                
                <?php   while($row = mysqli_fetch_assoc($result)):?>
                
                <div class="row">
                    <!-- timeline item 1 left dot -->
                    <div class="col-auto text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                        <span class="badge rounded-pill bg-success">&nbsp;</span>
                    </h5>
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <!-- timeline item 1 event content -->
                    <div class="col py-2">
                        <div class="card radius-15">
                            <div class="card-body">
                                <p class="card-text"><?php echo $row['Ticket_status_description']; ?></p>
                                <a href="deletestatus.php?id=<?php echo $row['Ticket_status_id']; ?>" class="btn btn-danger btn-round">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  endwhile; ?>
            </div>
            
            <h6 class="mb-0 text-uppercase">Update Ticket Status</h6>
            <hr/>

            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <input class="form-control mb-3" type="text" placeholder="Add comment" aria-label="default input example" name="Ticket_status_description">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endblock() ?>
<?php flushblocks(); ?>
