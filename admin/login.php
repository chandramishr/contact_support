<?php
    require '../config/Database.php';
    require 'classes/Auth.php';

    $db   = (new Database())->connect();
    $auth = new Auth($db);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($auth->login($_POST['username'], $_POST['password'])) {
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid credentials";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-4 mx-auto card shadow p-4">
        <h4 class="text-center">Admin Login</h4>

        <?php if (! empty($error)) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        ?>

        <form method="POST">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

</body>
</html>
