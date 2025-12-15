<?php
session_start();
session_destroy();
header("Location: /furniture/login.php");
exit();