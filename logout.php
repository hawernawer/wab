<?session_start();
unset($_SESSION);
session_destroy();
Header("Location:index.php")
?>
