<?php
session_start();
include 'connection.php';

$user_name = $_SESSION['user_name'];
echo "Hello ". $user_name;


// // Handle form submission and file upload
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Existing code for handling form submission
//     // ...
// }

// // Fetch user data (including image)
// $id = $_GET["id"];
// $sql = "SELECT user_image FROM users WHERE user_id = $id";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         $user_image = $row['user_image'];
//         echo "<img src='uploads/" . $user_image . "' alt='User Image' />";
//     }
// } else {
//     echo "No user found.";
// }

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<a class="btn btn-secondary" href="logout.php" role="button">Logout</a>
    <form action="signup.php" method="post" enctype="multipart/form-data">
       
    </form>
</body>
</html>
