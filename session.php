<?php
session_start();
if((isset($_SESSION['uname']))){
    
}
else{
        echo "<script>
        alert(\"Please LogIn\");
        location.href=\"admin_login.html\";
    </script>";
}