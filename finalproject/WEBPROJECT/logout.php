<?php
// when some one open this file it remove all the session which are strated and redirect it to the home page
session_start();
session_destroy();
header("Location:index.php");
?>