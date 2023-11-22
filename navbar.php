<?php $currentFile = basename($_SERVER['PHP_SELF']); ?>

<nav class="navbar navbar-expand-lg bg-light pt-4 pb-4" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: #E75480;">MYCRUDS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="employees.php">Employees</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="add-emp.php">Add Employee</a>
                </li>
            </ul>
            <?php if ($currentFile == 'employees.php'): ?>
            <form class="d-flex" role="search" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-warning" type="submit">Search</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
</nav>