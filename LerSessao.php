<?php

session_start();

if(isset($_SESSION['cidade'])) {
    echo $_SESSION['cidade'];
} else {
    echo "cidade não definida";
}