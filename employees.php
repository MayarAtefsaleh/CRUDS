<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<div class="container pt-5">
    <div class="row">
        <div class="col text-center">
            <h2 class="bg-light p-3" style="color:#F64A8A;">All Employees</h2>
        </div>
    </div>

    <?php
    // Check if a search query is present
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    // Get filtered employees based on the search query
    $employees = $searchQuery ? $db->searchEmployees($searchQuery) : $db->readData("employees");
    ?>

    <div class="row">
        <div class="col text-center">
            <?php if (count($employees)): ?>
            <table class="table table-dark table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Department</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $row): ?>
                    <tr>
                        <td><?php echo strtoupper($row['name']); ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo strtoupper($row['department']); ?></td>
                        <td><a href="edit-emp.php?id=<?php echo $row['id']; ?>">
                                <i class="fa-regular fa-pen-to-square" style="color:pink"></i>
                            </a></td>
                        <td><a href="delete-emp.php?id=<?php echo $row['id']; ?>">
                                <i class="fa-solid fa-user-xmark" style="color:red"></i>
                            </a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <h2 class="text-center alert alert-danger">Data not found</h2>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>