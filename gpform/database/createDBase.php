<?php
    $conn = mysqli_connect('localhost', 'root', '', 'cgpadb');

    if(!$conn) {
        die('Connection Error'.mysqli_error());
    }
?>