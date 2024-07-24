<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    include 'connection.php';

 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM users WHERE user_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      
        $row = $result->fetch_assoc();
    } else {
        echo "No user data found.";
        exit;
    }
} else {
    echo "User ID is not specified.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>User Details</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_phoneNum']); ?></td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-outline-primary" href="admin.php" role="button">Back to List</a>
    </div>
</body>
</html>
