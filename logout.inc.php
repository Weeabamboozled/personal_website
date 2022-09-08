<?php
session_start();
session_unset();
session_destroy();

header("Location: https://vacation-planner-website.000webhostapp.com/index.php");
?>