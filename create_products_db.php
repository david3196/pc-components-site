<?php

// Connect to the server
$db = new mysqli("localhost", "root", "");

// Check for errors
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

// Check if the database exists
$result = $db->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'components'");

if ($result->num_rows == 0) {
  // Create the database
  $sql = "CREATE DATABASE components";
  if ($db->query($sql) === TRUE) {
    echo "Database created successfully";
    $db->select_db("components");
    // Create the processors table
    
$sql = "CREATE TABLE processors (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    imglink VARCHAR(255) NOT NULL,
    stock INT(6) NOT NULL,
    socket VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    price FLOAT(10,2) NOT NULL,
    tdp INT(6) NOT NULL,
    cores INT(6) NOT NULL,
    threads INT(6) NOT NULL, 
    descr VARCHAR(1000) NOT NULL
  )";
  
  if ($db->query($sql) === TRUE) {
    echo "Processors table created successfully";
  } else {
    echo "Error creating table: " . $db->error;
  }
  
  // Create the motherboards table
  $sql = "CREATE TABLE motherboards (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    imglink VARCHAR(255) NOT NULL,
    stock INT(6) NOT NULL,
    price FLOAT(10,2) NOT NULL,
    form_factor VARCHAR(255) NOT NULL,
    socket VARCHAR(255) NOT NULL,
    memory_type VARCHAR(255) NOT NULL,
    memory_speed INT(6) NOT NULL,
    expansion_slots INT(6) NOT NULL,
    descr VARCHAR(1000) NOT NULL
  )";
  
  if ($db->query($sql) === TRUE) {
    echo "Motherboards table created successfully";
  } else {
    echo "Error creating table: " . $db->error;
  }
  
  // Create the memory table
  $sql = "CREATE TABLE memory (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    imglink VARCHAR(255) NOT NULL,
    stock INT(6) NOT NULL,
    price FLOAT(10,2) NOT NULL,
    type VARCHAR(255) NOT NULL,
    speed INT(6) NOT NULL,
    capacity INT(6) NOT NULL,
    descr VARCHAR(1000) NOT NULL
  )";
  
  if ($db->query($sql) === TRUE) {
    echo "Memory table created successfully";
  } else {
    echo "Error creating table: " . $db->error;
  }
  
  // Create the video cards table
  $sql = "CREATE TABLE video_cards (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    imglink VARCHAR(255) NOT NULL,
    stock INT(6) NOT NULL,
    price FLOAT(10,2) NOT NULL,
    expansion_slot VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    tdp INT(6) NOT NULL,
    descr VARCHAR(1000) NOT NULL
  )";
  
  if ($db->query($sql) === TRUE) {
    echo "Video cards table created successfully";
  } else {
    echo "Error creating table: " . $db->error;
  }
  
  // Create the power supply units table
  $sql = "CREATE TABLE power_supply_units (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    imglink VARCHAR(255) NOT NULL,
    stock INT(6) NOT NULL,
    price FLOAT(10,2) NOT NULL,
    wattage INT(6) NOT NULL,
    form_factor VARCHAR(255) NOT NULL,
    connectors VARCHAR(255) NOT NULL,
    descr VARCHAR(1000) NOT NULL
)";

if ($db->query($sql) === TRUE) {
  echo "Power supply units table created successfully";
} else {
  echo "Error creating table: " . $db->error;
}

// Create the cases table
$sql = "CREATE TABLE cases (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    imglink VARCHAR(255) NOT NULL,
    stock INT(6) NOT NULL,
    price FLOAT(10,2) NOT NULL,
    form_factor VARCHAR(255) NOT NULL,
    cooling VARCHAR(255) NOT NULL,
    expansion_slots INT(6) NOT NULL,
    descr VARCHAR(1000) NOT NULL
  )";

if ($db->query($sql) === TRUE) {
  echo "Cases table created successfully";
} else {
  echo "Error creating table: " . $db->error;
}
  } else {
    echo "Error creating database: " . $db->error;
  }
} else {
  echo "Database already exists";
}

// Connect to the database


// Check for errors
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}



// Close the connection
$db->close();

?>