<?php
include('function.php');


$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;
deleteProduct($productId);

header("location: index.php");
exit;
