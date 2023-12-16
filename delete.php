<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
            margin-top: 5 px;
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
<body>
    
<?php
$conn = new mysqli('localhost', 'root', '', 'products');
if (!$conn) {
    die("not connected");
}

// Check if ID is set in the URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $deleteQuery = "DELETE FROM list WHERE id=$id";

    $deleteResult = mysqli_query($conn, $deleteQuery);

    // if (!$deleteResult) {
    //     die("Delete failed: " . mysqli_error($conn));
    // } else {
    //     echo "Delete successful";

        // Fetch and display the remaining records in the table
        $selectQuery = "SELECT * FROM list";
        $selectResult = mysqli_query($conn, $selectQuery);

        if ($selectResult) {
            echo "<br><br><h1>Remaining Products:</h1><br>";
            echo "<table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Status</th>
                    
                </tr>";

            while ($row = mysqli_fetch_assoc($selectResult)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['category']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['created_at']}</td>
                        <td>{$row['updated_at']}</td>
                        <td>{$row['status']}</td>  
                    </tr>";
            }

            echo "</table>";
        } else {
            die("Select failed: " . mysqli_error($conn));
        }
    }

 else {
    die("Invalid ID");
}

// Close the connection
mysqli_close($conn);
?>

</body>
</html>