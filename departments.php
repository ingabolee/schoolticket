<?php
include './templates/student.php';
include 'config.php';
    

    
$sql = "SELECT * FROM departments";
$rows = mysqli_query($conn, $sql);

?>

<?php startblock('student') ?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Departments</h6>
        <hr/>

        <div class="col">
            <div class="card bg-info">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                    <?php   while($row = mysqli_fetch_assoc($rows)):?>
                        <li class="list-group-item bg-transparent text-dark"><i class='bx bx-group font-18 align-middle me-1'></i><?php echo $row['Department_name']; ?></li>
                        <?php  endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>
<?php flushblocks(); ?>