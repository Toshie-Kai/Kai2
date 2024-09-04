<?php
include('function.php');

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$row = getProductById($productId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand_name = $_POST['brand_name'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $model = $_POST['Model'];
    $prod_description = $_POST['prod_description'];

    if (!empty($brand_name) && !empty($category) && !empty($location) && !empty($price) && !empty($model) && !empty($prod_description)) {
        // Assuming you have an updateProduct function
        updateProduct($productId, $brand_name, $category, $location, $price, $model, $prod_description);
        header("Location: index.php");
        exit;
    } else {
        $errorMessage = "All fields are required.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
                    <label class="control-label" style="position:relative; top:7px;">Brand Name:</label>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="brand_name">
                        <option></option>
                        <?php foreach (['Whirlpool', 'LG', 'Haier', 'Condura', 'Samsung'] as $brand) : ?>
                            <option value="<?php echo $brand; ?>" <?php echo ($row['brand_name'] == $brand) ? 'selected' : ''; ?>><?php echo $brand; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative; top:7px;">Category:</label>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="category">
                        <option></option>
                        <?php $categories = ['Kitchen Equipment', 'Laundry Equipment', 'Entertainment Center Equipment', 'Cleaning Equipment', 'Cooling Equipment']; ?>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category; ?>" <?php echo ($row['category'] == $category) ? 'selected' : ''; ?>><?php echo $category; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative; top:7px;">Branch:</label>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="location">
                        <option></option>
                        <?php $locations = ['Compostela', 'Lilo-an', 'Danao']; ?>
                        <?php foreach ($locations as $location) : ?>
                            <option value="<?php echo $location; ?>" <?php echo ($row['location'] == $location) ? 'selected' : ''; ?>><?php echo $location; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative; top:7px;">Price:</label>
                </div>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name="price" value="<?php echo $row['price']; ?>">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative; top:7px;">Model:</label>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="Model" value="<?php echo $row['Model']; ?>">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-2">
                    <label class="control-label" style="position:relative; top:7px;">Product Description:</label>
                </div>
                <div class="col-sm-3">
                    <textarea class="form-control" id="prod_description" name="prod_description" rows="3"><?php echo htmlspecialchars($row['prod_description']); ?></textarea>
                </div>
            </div>
            <div class="buttons">
                <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            </div>
        </form>
        <?php if (!empty($errorMessage)): ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

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
