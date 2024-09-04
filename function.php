<?php
require_once 'config.php';

function getAllProducts()
{
    global $conn;
    $query = "SELECT * FROM products";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getProductById($id)
{
    global $conn;
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function createProduct($brand_name, $category, $location, $price, $model, $prod_description)
{
    global $conn;
    $query = "INSERT INTO products (brand_name, category, location, model, prod_description, price) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssd", $brand_name, $category, $location, $model, $prod_description, $price);
    return $stmt->execute();
}

function updateProduct($id, $brand_name, $category, $location, $price, $model, $prod_description)
{
    global $conn;
    $query = "UPDATE products SET brand_name = ?, category = ?, location = ?, price = ?, model = ?, prod_description = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $brand_name, $category, $location, $price, $model, $prod_description, $id);
    return $stmt->execute();
}

function deleteProduct($id)
{
    global $conn;
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>
