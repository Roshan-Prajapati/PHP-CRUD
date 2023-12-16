<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 35px 50px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border-radius: 12px;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 270px;
    }

    input[type="submit"]:hover {
        background-color: black;
    }
</style>

</head>
<body>

<?php
$conn = new mysqli('localhost', 'root', '', 'products');
if (!$conn) {
    die("not connected");
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $created_at = $_POST["created_at"];
    $updated_at = $_POST["updated_at"];
    $status = $_POST["status"];

    $updateQuery = "UPDATE list SET name='$name', description='$description', category='$category', price='$price', created_at='$created_at', updated_at='$updated_at', status='$status' WHERE id=$id";

    $updateResult = mysqli_query($conn, $updateQuery);

    if (!$updateResult) {
        die("Update failed: " . mysqli_error($conn));
    } else {
        echo "Update successful";
    }
    
}

// Fetch data for the selected ID
$id = $_GET["id"];
$selectQuery = "SELECT * FROM list WHERE id=$id";
$selectResult = mysqli_query($conn, $selectQuery);
$row = mysqli_fetch_assoc($selectResult);

?>

<h1>Update Data</h1>
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
    Description: <input type="text" name="description" value="<?php echo $row['description']; ?>"><br>
    Category: <input type="text" name="category" value="<?php echo $row['category']; ?>"><br>
    Price: <input type="text" name="price" value="<?php echo $row['price']; ?>"><br>
    Created At: <input type="text" name="created_at" value="<?php echo $row['created_at']; ?>"><br>
    Updated At: <input type="text" name="updated_at" value="<?php echo $row['updated_at']; ?>"><br>
    Status: <input type="text" name="status" value="<?php echo $row['status']; ?>"><br>
    <input type="submit" value="Update">
</form>

</body>
</html>

