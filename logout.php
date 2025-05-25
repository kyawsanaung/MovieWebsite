<?php
    session_start();
    session_unset(); //remove all session array data
    session_destroy(); //end the session
    header("Location: index.php");
?>