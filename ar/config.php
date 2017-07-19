<?php

#############################################################
# DataBase Connect
#############################################################
    $dbServer      = 'localhost';
    $dbDatabase    = 'firawxed_rida';
    $dbUser        = 'firawxed_rida';
    $dbPass        = 'rockme/1991';
    
    $pdo = new PdoWrapper();
    $pdo->pdoConnect($dbServer, $dbUser, $dbPass, $dbDatabase);

#############################################################
# Error Reporting
#############################################################

	error_reporting(0);

?>