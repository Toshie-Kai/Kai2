<?php
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand_name = $_POST['brand_name'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $model = $_POST['Model'];
    $prod_description = $_POST['prod_description'];

    do {
        if (empty($brand_name) || empty($category) || empty($location) || empty($price) || empty($model) || empty($prod_description)) {
            echo "Error: All fields are required.";
            exit;
        }

        // Adding product
        createProduct($brand_name, $category, $location, $price, $model, $prod_description);

        // Reset fields
        $brand_name = "";
        $category = "";
        $location = "";
        $price = "";
        $model = "";
        $prod_description = "";

        $successMessage = "Product Added Successfully";
        header("Location: index.php");
        exit;
    } while (false);
}

$products = getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logo">
        <img src="images/1.png" alt="Logo">
        <h1>Appliances <span class="green">Zone</span></h1>
    </div>
    <div class="tb">
        <form method="post">
            <div class="row form-group">
                <div class="col-sm-2">
                    <label style="position:relative;margin-bottom: 10px;">Brand Name:</label>
                </div>
                <div class="tbs">
                    <select class="form-control" name="brand_name">
                        <option value="Whirlpool">Whirlpool</option>
                        <option value="LG">LG</option>
                        <option value="Haier">Haier</option>
                        <option value="Condura">Condura</option>
                        <option value="Samsung">Samsung</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative; margin-bottom: 10px;">Category:</label>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="category">
                        <option value=""></option>
                        <option value="Kitchen Equipment">Kitchen Equipment</option>
                        <option value="Laundry Equipment">Laundry Equipment</option>
                        <option value="Entertainment Center Equipment">Entertainment Center Equipment</option>
                        <option value="Cleaning Equipment">Cleaning Equipment</option>
                        <option value="Cooling Equipment">Cooling Equipment</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative; margin-bottom: 10px;">Branch:</label>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="location">
                        <option value=""></option>
                        <option value="Compostela">Compostela</option>
                        <option value="Lilo-an">Lilo-an</option>
                        <option value="Danao">Danao</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative;margin-bottom: 10px;">Price:</label>
                </div>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name="price">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative;margin-bottom: 10px;">Model:</label>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="Model">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative; margin-bottom: 10px;">Product Description:</label>
                </div>
                <div class="col-sm-3">
                    <textarea class="form-control" id="prod_description" name="prod_description" rows="3"></textarea>
                </div>
            </div>
            <div class="buttons">
                <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            </div>
        </form>
        <div class="carousel">
            <div class="slides">
                <img src="images/4.jpg" alt="Image 1">
                <img src="images/6.jpg" alt="Image 2">
                <img src="images/5.jpg" alt="Image 3">
                <img src="images/6.jpg" alt="Image 1 Clone"> <!-- Clone first image for seamless transition -->
            </div>
            <div class="blur left"></div>
            <div class="blur right"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelector('.slides');
            const images = slides.querySelectorAll('img');
            const totalImages = images.length;
            let index = 0;

            function showNextSlide() {
                index++;
                if (index >= totalImages) {
                    index = 0;
                }
                slides.style.transform = `translateX(${-index * 100}%)`;
            }

            setInterval(showNextSlide, 5000); // Change slide every 5 seconds
        });
    </script>
</body>
</html>
