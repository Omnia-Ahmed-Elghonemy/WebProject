<?php
session_start();
session_destroy();
header("Location: /WebProject/admin/login.php");
exit();