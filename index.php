<?php
include 'config.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<h2>Products</h2>
<table border = 1>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Barcode</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['barcode']}</td>
                    <td>{$row['created_at']}</td>
                    <td>{$row['updated_at']}</td>
                    <td>
                        <a href='update.php?id={$row['id']}'>Edit</a> | 
                        <a href='delete.php?id={$row['id']}'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No products found</td></tr>";
    }
    ?>
</table>

<a href="create.php">Add New Product</a>
