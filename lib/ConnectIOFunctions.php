<?php

require( __DIR__ . '/ElephantIO/Client.php');

use ElephantIO\Client as ElephantIOClient;

class ConnectIOFunctions {

    public static function sendJSON($json = null, $action = null) {
        if (!defined("ELEPHANTIO_CONFIG_URL"))
            throw new Exception("ELEPHANTIO_CONFIG_URL is not defined");
        if (!is_string(ELEPHANTIO_CONFIG_URL))
            throw new Exception("ELEPHANTIO_CONFIG_URL must be string");
        if (empty($action)) {
            if (!defined("ELEPHANTIO_CONFIG_DEFAULT_ACTION"))
                throw new Exception("ELEPHANTIO_CONFIG_DEFAULT_ACTION is not defined");
            if (!is_string(ELEPHANTIO_CONFIG_DEFAULT_ACTION))
                throw new Exception("ELEPHANTIO_CONFIG_DEFAULT_ACTION must be string");
            $action = ELEPHANTIO_CONFIG_DEFAULT_ACTION;
            if (empty($action))
                throw new Exception("ELEPHANTIO_CONFIG_DEFAULT_ACTION is empty ");
        }

        $elephant = new ElephantIOClient(ELEPHANTIO_CONFIG_URL, 'socket.io', 1, false, true, true);
        $elephant->init();
        $elephant->send(ElephantIOClient::TYPE_EVENT, null, null, json_encode(array('name' => $action, 'args' => $json)));
        $elephant->close();
        return true;
    }

}

?>