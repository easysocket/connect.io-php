<?php

/*
 * IMPORTANT
 */

//you must define ELEPHANTIO_CONFIG_URL and ELEPHANTIO_CONFIG_ACTION for node.js
define("ELEPHANTIO_CONFIG_URL", "http://pc.minikod.com:8081");
define("ELEPHANTIO_CONFIG_DEFAULT_ACTION", "socketEvent");
// include ElephantIOFunctions functions we worte
require( __DIR__ . '/lib/ConnectIOFunctions.php');

/*
 * IMPORTANT
 */

try {
    $obj = new stdClass();
    $obj->method = "add_topic";
    $obj->data = "sadsadasd";
    $res = ConnectIOFunctions::sendJSON($obj);
    if ($res) {
        echo "success";
    } else {
        echo "fail";
    }
} catch (Exception $exc) {
    echo $exc->xdebug_message;
}
?>
