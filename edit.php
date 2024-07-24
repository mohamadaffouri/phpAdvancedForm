<?php
 include 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $user_name = $conn->real_escape_string($_POST['user_name']);
        $user_email= $conn->real_escape_string($_POST['user_email']);
        $user_phone = $conn->real_escape_string($_POST['$user_phone']);

        $sql = "UPDATE users SET user_name='$user_name', user_email='$user_email', user_phoneNum='$user_phone' WHERE user_id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    $sql = "SELECT * FROM users WHERE user_id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit();
    }
} else {
    echo "No ID provided.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>Edit Client</h2>
        <form action="" method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_name" value="<?php echo htmlspecialchars($row['user_name']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="user_email" class="form-control" name="user_email" value="<?php echo htmlspecialchars($row['user_email']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Salary</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="$user_phone" step="0.01" value="<?php echo htmlspecialchars($row['user_phoneNum']); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
