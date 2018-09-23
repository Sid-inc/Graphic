
<?php
define('SERVER', '127.0.0.1');
define('USER', 'root');
define('PASS', '');
define('DB', 'graphic');
function db_connect(){
    $link = mysqli_connect(SERVER, USER, PASS, DB) or die("Error: ".mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8")){
        printf("Error: ".mysqli_error($link));
    }
    return $link;
}
    
?>