<?php

if(isset($_POST['logout'])){
    if(isset($_SESSION['uname'])){
        unset($_SESSION['uname']);
        unset($_SESSION['picture']);
        session_destroy();
        echo "<script>location.href=\"login.html\";</script>";
    }
    
    else{echo "<script>location.href=\"login.html\";</script>";}

}
?>