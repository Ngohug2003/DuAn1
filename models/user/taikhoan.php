<?php  
function check_user($username,$password){
$sql = "SELECT * FROM users WHERE username_user='" . $username . "' AND password_user='" . $password . "'";
$tk = pdo_query_one($sql);
return $tk ;
}
function dangxuat(){
    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
        echo "<script language='javascript'>
        window.location.reload();</script>";
        

    }
}



?>