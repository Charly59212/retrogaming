<?php
session_start();

// Check if user is logged in and is an administrator
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Redirection to the dashboard
header('Location: ../public/index.php?action=adminDashboard');
exit;
?>
