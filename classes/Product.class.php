<?php
class Product {
    // Properties
    private $productId;
    private $name;
    private $price;
    private $description;
    private $quantityInStock;

    // Constructor
    public function __construct($productId, $name, $price, $description, $quantityInStock) {
        $this->productId = $productId;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->quantityInStock = $quantityInStock;
    }

    // Methods

    // Getters and Setters
    public function getProductId() {
        return $this->productId;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getQuantityInStock() {
        return $this->quantityInStock;
    }

    public function setQuantityInStock($quantityInStock) {
        $this->quantityInStock = $quantityInStock;
    }

    // Method to calculate the total value of the product inventory
    public function calculateInventoryValue() {
        return $this->price * $this->quantityInStock;
    }

    // Method to display product information
    public function displayProductInfo() {
        echo "Product ID: " . $this->productId . "<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Price: $" . $this->price . "<br>";
        echo "Description: " . $this->description . "<br>";
        echo "Quantity in Stock: " . $this->quantityInStock . "<br>";
        echo "Total Inventory Value: $" . $this->calculateInventoryValue() . "<br>";
    }
}

// Create an instance of the Product class
$product1 = new Product(1, "Smartphone", 499.99, "High-end smartphone with advanced features.", 100);

// Display product information
$product1->displayProductInfo();

// Update product information
$product1->setName("New Smartphone Model");
$product1->setPrice(599.99);
$product1->setQuantityInStock(150);

// Display updated product information
$product1->displayProductInfo();

?>