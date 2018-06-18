<?php
require 'config.ini.php';

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS);


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}




		$sql = "CREATE DATABASE ". DB_DATABASE;
		if ($conn->query($sql) === TRUE) {
		    echo "Database created successfully";
		} else {
		    echo "Error creating database: " . $conn->error;
		}

$conn->close();

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);


		$administrator = "CREATE TABLE admin (
				email VARCHAR(255), 
				password VARCHAR(255) NOT NULL,
				PRIMARY KEY(email)
				)";

		$users = "CREATE TABLE users (
				id int NOT NULL AUTO_INCREMENT,
				email VARCHAR(255), 
				password VARCHAR(255) NOT NULL,
				name VARCHAR(30),
				lastname VARCHAR(255),
				foto VARCHAR(255),
				birthdate date default NULL,
				wallet DECIMAL(6,2) NOT NULL DEFAULT 0.00, 
				PRIMARY KEY(id, email)
				)";

		$trip = "CREATE TABLE trip_details (
				trip_code int NOT NULL AUTO_INCREMENT,
				id int NOT NULL,
				trip_date date NOT NULL,
				trip_time VARCHAR(255),
				status VARCHAR(255) DEFAULT 'active',
				origin_lat DECIMAL(12,9),
				origin_lng DECIMAL(12,9),
				destiny_lat DECIMAL(12,9),
				destiny_lng DECIMAL(12,9),
				seats int,
				cost DECIMAL(6,2),
				PRIMARY KEY(trip_code),
				FOREIGN KEY(id) REFERENCES users(id)
				)";

		$cars = "CREATE TABLE cars (
				maker VARCHAR(255),
				model VARCHAR(255),
				picture VARCHAR(255),
				year int,
				seats int,
				license_plate VARCHAR(255) NOT NULL,
				cat_code int NOT NULL,
				PRIMARY KEY(license_plate),
				FOREIGN KEY (cat_code) REFERENCES categories(cat_code)
				)";

		$categories = "CREATE TABLE categories (
				cat_code int NOT NULL,
				fuel VARCHAR(255), 
				PRIMARY KEY(cat_code)
				)";

		$possessions = "CREATE TABLE possessions (
				id int NOT NULL,
				license_plate VARCHAR(255) NOT NULL, 
				FOREIGN KEY (id) REFERENCES users(id),
				FOREIGN KEY (license_plate) REFERENCES cars(license_plate)
				)";

		$trips = "CREATE TABLE trips (
				passenger_id int NOT NULL,
				trip_code int NOT NULL,
				seats int NOT NULL,
				FOREIGN KEY(passenger_id) REFERENCES users(id),
				FOREIGN KEY(trip_code) REFERENCES trip_details(trip_code)
				)";

		$tables = [$administrator, $users, $categories, $cars, $possessions, $trip, $trips];

		foreach($tables as $sql){

			echo "<br>";
		    
		   if ($conn->query($sql) === TRUE) {
			   header("location:../backOffice.php");
			} else {
			    echo "Error creating table: " . $conn->error;
			}
		}

		$conn->close();
	?>