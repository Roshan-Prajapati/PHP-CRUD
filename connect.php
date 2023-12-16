<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database show</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 60vh;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top:5 px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #4CAF50;
            color: #4CAF50;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<?php
$conn = new mysqli('localhost', 'root', '', 'products');
if (!$conn) {
    die("not connected");
} else {
    echo("Connected");
}

$a = $_REQUEST["id"];
$b = $_REQUEST["name"];
$c = $_REQUEST["description"];
$d = $_REQUEST["category"];
$e = $_REQUEST["price"];
$f = $_REQUEST["created_at"];
$g = $_REQUEST["updated_at"];
$h = $_REQUEST["status"];

$str = "INSERT INTO list VALUES ($a, '$b', '$c', '$d', '$e', '$f', '$g', '$h')";

$result = mysqli_query($conn, $str);
if (!$result) {
    die("not inserted");
} else {
    echo("inserted");
}

// Fetch and display all data from the items table
$selectQuery = "SELECT * FROM list";
$selectResult = mysqli_query($conn, $selectQuery);

echo "<br><br> <h1>Show Your Inserted Data:</h1><br>";
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Description</th><th>Category</th><th>Price</th><th>Created At</th><th>Updated At</th><th>Status</th><th class='action-column'>Action</th></tr>";

while ($row = mysqli_fetch_assoc($selectResult)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['created_at'] . "</td>";
    echo "<td>" . $row['updated_at'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td class='action-buttons'><a href='update.php?id=" . $row['id'] . "'>Update</a><a href='delete.php?id=" . $row['id'] . "' class='delete-button'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";

// Close the connection
mysqli_close($conn);
?>

</body>
</html>
