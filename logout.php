<?php

session_start();

unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["isLogedIn"]);
header('Location: index.html'); // default page

?>
