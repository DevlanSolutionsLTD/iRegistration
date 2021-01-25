<?php
session_start();
unset($_SESSION['auth_id']);
unset($_SESSION['auth_email']);
session_destroy();
header("Location: index.php");
exit;
