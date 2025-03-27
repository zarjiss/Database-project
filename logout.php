<?php
session_start();
session_destroy(); // session has been closed
header("Location: index.php"); // redirect to index.php 
exit();
?>
