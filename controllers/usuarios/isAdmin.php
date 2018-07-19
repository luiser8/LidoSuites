<?php
if ($_SESSION['nivel'] != '1') {
    header('Location: ../pages/');
     die();
}