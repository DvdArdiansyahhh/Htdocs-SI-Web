<?php
require('query.php');
session_start();

if (!isset($_SESSION['name'])) {
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}

$crud = new crud(); // Create a new instance of your CRUD class

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Add logic to delete the user with the specified ID using your CRUD class
    if ($crud->deleteUser($user_id)) {
        // User deleted successfully
        // You can add a success message or redirect back to the home page
        header('Location: home.php');
    } else {
        // Deletion failed
        // You can add an error message or redirect back to the home page
        header('Location: home.php');
    }
} else {
    // Handle the case where 'id' is not provided in the URL query parameter
    // You can add an error message or redirect back to the home page
    header('Location: home.php');
}
?>