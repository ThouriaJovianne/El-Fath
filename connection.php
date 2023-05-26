<?php

    $database= new mysqli("localhost","root","","masjid");

    if ( $database->connect_error ){

        die( "Connection failed:  ".$database->connect_error );

    }

?>