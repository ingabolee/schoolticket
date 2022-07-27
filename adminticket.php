<?php
    include 'templates/admin.php';
    include 'config.php';

    
$sql = "SELECT * FROM tickets";
$rows = mysqli_query($conn, $sql);


?>

<?php startblock('Admin') ?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Tickets</h6>
        <h7><small>Click on a ticket to comment</small></h7>
            <hr/>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <?php   while($row = mysqli_fetch_assoc($rows)):?>

                <?php 
                $Ticket_id = $row['Ticket_id'];
                $Ticket_title = $row['Ticket_title'];
                $Ticket_description = $row['Ticket_description'];
                $Department_id = $row['Department_id'];
                
                $sql = "SELECT * FROM departments WHERE Department_id = '$Department_id'";
                $result = mysqli_query($conn, $sql);
                $rowe = mysqli_fetch_assoc($result);
                $Department_name = $rowe['Department_name'];
                    
                ?>
                <a href="adminstatus.php?id=<?php echo $Ticket_id; ?>">
                <div class="col">
                    <div class="card radius-10 bg-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-dark"><?php echo $Department_name;?></p>
                                    <h4 class="my-1 text-dark"><?php echo $Ticket_description;?></h4>
                                </div>
                                <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bxs-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                

            <?php  endwhile; ?>
  
                
        </div>
    </div>
</div>
<?php endblock() ?>
<?php flushblocks(); ?>