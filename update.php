<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price', quantity='$quantity', barcode='$barcode', updated_at=NOW() WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: index.php");
    exit();
}
?>

<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
    <label>Description:</label>
    <textarea name="text" required><?php echo $row['description']; ?></textarea><br>
    <label>Price:</label>
    <input type="text" step="0.01" name="price" value="<?php echo $row['price']; ?>" required><br>
    <label>Quantity:</label>
    <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" required><br>
    <label>Barcode:</label>
    <input type="text" name="barcode" value="<?php echo $row['barcode']; ?>" required><br>
    <input type="submit" name="submit" value="Update Product">
</form>

<a href="index.php">Back to Home</a>
