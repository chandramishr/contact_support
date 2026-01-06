<?php
    require '../config/Database.php';
    require 'includes/auth_check.php';

    $db = (new Database())->connect();

    $stmt = $db->query("SELECT * FROM contact_support ORDER BY id DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">Admin Dashboard</span>
    <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
</nav>

<div class="container mt-4">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Message</th>
                <th>Image</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['full_name']) ?></td>
                <td><?php echo htmlspecialchars($row['email']) ?></td>
                <td><?php echo htmlspecialchars($row['mobile_no']) ?></td>
                <td><?php echo htmlspecialchars($row['message']) ?></td>
                <td>
                    <img src="../uploads/<?php echo $row['image'] ?>"
                         width="60" height="60"
                         class="rounded border">
                </td>
                <td><?php echo $row['created_at'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
