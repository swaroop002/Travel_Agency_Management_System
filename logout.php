<?php

if(isset($_POST['logout'])){
    if(isset($_SESSION['uname'])){
        unset($_SESSION['uname']);
        session_destroy();
        echo "<script>location.href=\"admin_login.html\";</script>";
    }
    
    else{echo "<script>location.href=\"admin_login.html\";</script>";}

}
?>