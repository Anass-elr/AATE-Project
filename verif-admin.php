<?php
    session_start();
    if( !isset( $_SESSION['root']) || !$_SESSION['root'] ){
        header("Location: conn.php?error=3");
    }

?>