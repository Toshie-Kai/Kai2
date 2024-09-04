<?php
require_once 'function.php';

$products = getAllProducts();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Rjays Appliances</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>

<body>
    <div class="logo">
        <img src="images/1.png">
    <h1>Appliances <span class="green">Zone.</span></h1>
    <button onclick="location.href='create.php';">Add New</button>
    <input type="text" id="search-box" onkeyup="searchFunction()" placeholder="Search for products based on Brand Name..">
    </div>

    
    <table border="1" name="">
        <tr>
            <th>Brand name</th>
            <th>Category</th>
            <th>Location</th>
            <th>Price</th>
            <th>Model</th>
            <th>Product Description</th>
            <th>Actions</th>

        </tr>
        <?php while ($product = $products->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $product['brand_name']; ?></td>
                <td><?php echo $product['category']; ?></td>
                <td><?php echo $product['location']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['Model']; ?></td>
                <td><?php echo $product['prod_description']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>"> Edit</a>
                    <a href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');"> Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
<script>
    function searchFunction() {
        // Get the input value and convert it to lowercase
        let input = document.getElementById('search-box').value.toLowerCase();

        // Get all table rows
        let rows = document.getElementsByTagName('tr');

        // Loop through each row starting from index 1 (skipping the header row)
        for (let i = 1; i < rows.length; i++) {
            // Get all cells within the current row
            let cells = rows[i].getElementsByTagName('td');

            // Flag to indicate if the search term was found in any cell of this row
            let found = false;

            // Loop through each cell in the row
            for (let j = 0; j < cells.length; j++) {
                // Get the text content of the cell, handling different browser compatibility
                let textValue = cells[j].textContent || cells[j].innerText;

                // Check if the search term is found in the cell content
                if (textValue.toLowerCase().indexOf(input) > -1) {
                    found = true; // Set found to true
                    break; // Exit the inner loop since the search term is found in this row
                }
            }

            // If the search term was found in any cell of this row, display the row; otherwise, hide it
            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
</script>


</html>