<?php

echo $_SERVER["REQUEST_URI"];
if($_SERVER["REQUEST_URI"] === "/public/views/home"){
    require_once("./views/home.php");
}