<?php
$serverName = "localhost:3307";
$userName = "root";
$passWord = "";
$database = "chanlaptop";

// biến kết nối csdl
$conn = mysqli_connect($serverName, $userName, $passWord, $database);

// Nếu không kết nối được cơ sở dữ liệu thì sẽ huỷ bỏ connect
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}