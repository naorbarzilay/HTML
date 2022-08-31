<?php
$servername = "localhost";
$username="root";
$password = ""; // change this to empty string if you are using xampp and not mamp
$conn = new mysqli($servername,$username,$password);
if ($conn->connect_error) {
    echo "<h2>error connecting to db</h2>";
    die();
}
$dbName = "ProjectDB";

if (!$conn->select_db($dbName)){
    $sql = "CREATE DATABASE $dbName";
   
   if ($conn->query($sql)){
        $conn->select_db($dbName);
        echo "<p>database $dbName created</p>";
         $sql = 'CREATE TABLE `ProjectDB`.`users`(`email` VARCHAR(200) NOT NULL , `fullname` VARCHAR(200) NOT NULL , `username` VARCHAR(200) NOT NULL , `birthdate` DATE NOT NULL , `active` TINYINT NOT NULL DEFAULT 0 , `password` VARCHAR(100) NOT NULL , PRIMARY KEY (`email`)) ENGINE = InnoDB;';
      if ($conn->query($sql)){
          echo "users tables created";
      } else {
          $message = "<p> error creating users table error: $conn->error </p>";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
      $sql = 'CREATE TABLE `ProjectDB`.`formulas` ( `id` VARCHAR(100) NOT NULL , `title` VARCHAR(200) NOT NULL , `body` VARCHAR(1000) NOT NULL , `image` VARCHAR(200) NOT NULL , `href` VARCHAR(200) NOT NULL ,`publishDate` DATE NOT NULL,`publishName` VARCHAR(100) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;';
      if ($conn->query($sql)){
          echo "formulas tables created";
      } else {
          $message = "<p> error creating formulas table error: $conn->error </p>";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
      $sql = 'CREATE TABLE `ProjectDB`.`components` ( `idcomponet` INT(10) NOT NULL , `id_formula` VARCHAR(100) NOT NULL , `description` VARCHAR(1000) , PRIMARY KEY (`idcomponet`,`id_formula`)) ENGINE = InnoDB;';
      if ($conn->query($sql)){
          echo "components tables created";
      } else {
          $message = "<p> error creating components table error: $conn->error </p>";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
      $sql = 'CREATE TABLE `ProjectDB`.`instructions` ( `inst_id` INT(10) NOT NULL , `id_formula` VARCHAR(100) NOT NULL , `description` VARCHAR(1000) , PRIMARY KEY (`inst_id`,`id_formula`)) ENGINE = InnoDB;';
      if ($conn->query($sql)){
          echo "instructions tables created";
      } else {
          $message = "<p> error creating instructions table error: $conn->error </p>";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
   };
}
