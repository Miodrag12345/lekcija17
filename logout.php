<?php

if(session_status()==PHP_SESSION_NONE){
    session_status();
}
session_destroy();

header("Location:index.php");