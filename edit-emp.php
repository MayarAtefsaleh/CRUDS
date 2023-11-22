<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php if(isset($_GET['id']) && is_numeric($_GET['id']) ):?>

<?php $row = $db->findrecord("employees",$_GET['id']); ?>
<?php if($row): ?>


<?php

$error = '';
$success = '';
$departments = array("it", "cs", "sw");

if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   

    if (empty($name) or empty($email) or empty($department)) {

        $error = "Please Fill all fields";
    } else {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $department = strtolower($department);
            if (in_array($department, $departments)) {


                if(!empty($password)){
                    $password=filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                     if (strlen($password) > 6) {
                    
                    $newpassword= $db->encPassword($password);
                      
                } else {
                    $error = "Pasdword must be greater than 6 characters!";
                }
                
                }else{
                    
                 $password=$row['password'];
                }
               
                 $sql= "UPDATE employees SET `name`='$name',`email`='$email',`department`='$department',`password`='$password' WHERE `id`='$row[id]' ";
                    $success = $db->updateData($sql);
            }
            
            else {
                $error = "This department not found!";
            }
        } else {
            $error = "Please try validate email";
        }
    }
}
?>


<div class="container pt-5">

    <div class="row">

        <div class="col text-center">

            <h2 class="bg-light p-3" style="color:#F64A8A;">
                Edit employee
            </h2>
        </div>
    </div>






    <div class="row">
        <div class="col">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp"
                        placeholder="Enter Name" name="name" value="<?php  echo $row['name']; ?>">

                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Department</label>
                    <input type="text" class="form-control" id="exampleInputDep" aria-describedby="emailHelp"
                        placeholder="Enter Department" name="department" value="<?php  echo $row['department']; ?>">

                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Email" name="email" value="<?php  echo $row['email']; ?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password"
                        name="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-warning" name="submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="row p-5">
        <div class="col">
            <?php if ($error != '') : ?>
            <h2 class="text-center alert alert-danger"><?php echo $error; ?></h2>
            <?php endif; ?>

            <?php if ($success != '') : ?>
            <h2 class="text-center alert alert-success"><?php echo $success; ?></h2>
            <?php endif; ?>

        </div>
    </div>


    <?php endif; ?>

    <?php endif; ?>

</div>


<?php include 'footer.php' ?>