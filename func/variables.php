<?php

   if(empty($_SERVER['DOCUMENT_ROOT']) && !empty($_SERVER['SCRIPT_FILENAME'])) {
    $_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0 - strlen($_SERVER['PHP_SELF'])));
    }
    if(empty($_SERVER['DOCUMENT_ROOT']) && !empty($_SERVER['PATH_TRANSLATED'])) {
    $_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr(str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']), 0, 0 - strlen($_SERVER['PHP_SELF'])));
    }
    include("db/db.php");

?>
