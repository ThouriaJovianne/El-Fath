<?php

    $database= new mysqli("localhost","root","","ashbal_el-fath");

    if ( $database->connect_error ){

        die( "Connection failed:  ".$database->connect_error );

    }

?>