<?php
if (isset($_SESSION['login'])) {
    header('Location: pages/');
    die();
} else {
    header('Location: pages/login');
}