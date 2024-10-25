<?php
include 'config.php';

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];

    $sql = "INSERT INTO products (name, description, price, quantity, barcode, created_at, updated_at)
            VALUES ('$name', '$description', '$price', '$quantity', '$barcode', NOW(), NOW())";

    if ($conn->query($sql)=== TRUE){
        echo "New Product Added Successfully";
    } else {
        echo "Error: ". $sql. "<br>" . $conn->error;
    }

    header ("Location: index.php");
    exit();
}
?>

<form method="post" action="create.php">
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Description:</label>
    <textarea name="text" required></textarea><br>
    <label>Price:</label>
    <input type="text" step="0.01" name="price" required><br>
    <label>Quantity:</label>
    <input type="text" name="quantity" required><br>
    <label>Barcode:</label>
    <input type="text" name="barcode" required><br>
    <input type="submit" name="submit" value="Add Product">
</form>

<a href="index.php">Back to Home</a>

