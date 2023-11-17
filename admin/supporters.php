<?php
ob_start();
require_once "config/connection.php";

session_start();


// If its not logged in direct to login page
if (isset($_SESSION["adminLoggedin"]) !== true) {
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Supporters - Quakefocus Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php
    include_once "sidenav.html";
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Supporters</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Supporters</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <i class="fas fa-users me-1"></i>
                            Supporter Records
                        </div>
                        <a class="btn btn-primary " href="insert.php?table=supporters">Create new <i class="fas fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Message</th>
                                    <th>Amount of Support</th>
                                    <th>Image</th>
                                    <th>Active</th>
                                    <th>Tag</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Message</th>
                                    <th>Amount of Support</th>
                                    <th>Image</th>
                                    <th>Active</th>
                                    <th>Tag</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
                                // Getting all the users which is active and ordering by newest to oldest
                                $stmt = $conn->prepare("SELECT *  FROM supporters ORDER BY created_at DESC");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) :
                                ?>
                                    <tr>
                                        <td>
                                            <a class="btn btn-link" href="update.php?table=supporters&id=<?= $row['id'] ?>">
                                                <i class="fas fa-cog">
                                                </i>
                                            </a>
                                        </td>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['message'] ?></td>
                                        <td><?= $row['amount'] ?></td>
                                        <td><?= $row['image'] ?></td>
                                        <td><?= $row['active'] ?></td>
                                        <td><?= $row['tag'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                        <td><?= $row['updated_at'] ?></td>
                                    </tr>

                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; QuakeFocus</div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>

</html>