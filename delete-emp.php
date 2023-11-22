<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php if(isset($_GET['id']) && is_numeric($_GET['id']) ):?>

<?php $row = $db->findrecord("employees",$_GET['id']); ?>
<?php if($row): ?>



<div class="container pt-5">

    <div class="row">

        <div class="col text-center">

            <h2 class="bg-light p-3" style="color:#F64A8A;">
                Delete employee
            </h2>
        </div>
    </div>
</div>


<div class="row p-5">
    <div class="col">


        <?php if ($db->deleteData("employees",$row['id'])) : ?>
        <h2 class="text-center alert alert-success"><?php echo $db->deleteData("employees",$row['id']); ?></h2>
        <?php endif; ?>

    </div>
</div>


<?php endif; ?>

<?php endif; ?>

<?php include 'footer.php' ?>