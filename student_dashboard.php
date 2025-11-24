<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    die("Access denied");
}
echo " Welcome Student!";