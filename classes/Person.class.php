<?php
// Define a class called "Person"
class Person {
    // Properties (variables)
    public $name;
    public $age;

    // Constructor method
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Method to display information about the person
    public function displayInfo() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . " years old<br>";
    }
}

// Create an instance of the Person class
$person1 = new Person("John", 30);

// Access the properties and call methods
$person1->displayInfo();

// Create another instance of the Person class
$person2 = new Person("Alice", 25);
$person2->displayInfo();
?>