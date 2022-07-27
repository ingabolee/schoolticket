<?php
include './templates/admin.php';
include 'config.php';
 
    
$sql = "SELECT * FROM departments";
$rows = mysqli_query($conn, $sql);

?>

<?php startblock('Admin') ?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Departments</h6>
        <hr/>
        <?php   while($row = mysqli_fetch_assoc($rows)):?>

        <a href="editdepartment.php?id=<?php echo $row['Department_id']; ?>">
            <div class="col">
                <div class="card bg-info">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent text-dark"><i class='bx bx-group font-18 align-middle me-1'></i><?php echo $row['Department_name']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
        <?php  endwhile; ?>
    </div>
</div>
<?php endblock() ?>
<?php flushblocks(); ?>