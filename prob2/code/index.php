<?php
if( $_SESSION['auth'] != 1 ) {
    require( 'login.php' );
    session_start();
}
else {
    echo "hello";
}
?>
