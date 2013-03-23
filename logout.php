<?php
session_start();
session_destroy();
echo 'Anda telah logout, terimakasih';
header( "refresh:1;url=index.php" );
?>