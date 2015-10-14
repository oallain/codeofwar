<?php

class SocketConnection {

    private $socket;
    private $address;
    private $port;
    private $domain = AF_INET;
    private $type = SOCK_STREAM;
    private $protocol = SOL_TCP;

    public function getSocket() {
        return $this->socket;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPort() {
        return $this->port;
    }

    public function getDomain() {
        return $this->domain;
    }

    public function getType() {
        return $this->type;
    }

    public function getProtocol() {
        return $this->protocol;
    }

    public function setSocket($socket) {
        $this->socket = $socket;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPort($port) {
        $this->port = $port;
    }

    public function setDomain($domain) {
        $this->domain = $domain;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setProtocol($protocol) {
        $this->protocol = $protocol;
    }

    public function __construct($address, $port) {
        $this->setAddress($address);
        $this->setPort($port);
    }
    
    public function __destruct() {
        $this->close();
    }

    public function connect() {

        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if ($socket === false) {
            throw new Exception("socket_create() a échoué : raison :  " . socket_strerror(socket_last_error()) . "\n");
        } else {
            $this->setSocket($socket);
        }

        $result = socket_connect($this->getSocket(), $this->getAddress(), $this->getPort());
        if ($this->getSocket() === false) {
            throw new Exception("socket_connect() a échoué : raison : ($result) " . socket_strerror(socket_last_error($this->getSocket())) . "\n");
        }

        return true;
    }

    public function write($message) {
        $message = json_encode($message) . SOCKET_MESSAGE_SUFFIX;
        if (socket_write($this->getSocket(), $message, strlen($message)) === false) {
            throw new Exception("socket_write() a échoué : " . socket_strerror(socket_last_error($this->getSocket())) . "\n");
        }

        return true;
    }

    public function read() {
        $out = "";
        while ($read = socket_read($this->getSocket(), 2048)) {

            $out .= $read;

            if (substr($read, -(strlen(SOCKET_MESSAGE_SUFFIX))) == SOCKET_MESSAGE_SUFFIX) {
                return json_decode(substr($out,0, -(strlen(SOCKET_MESSAGE_SUFFIX))));
            }
        }

        throw new Exception("socket_read() a échoué : " . socket_strerror(socket_last_error($this->getSocket())) . "\n");
    }
    
    public function close() {
        socket_close($this->getSocket());
        
        return true;
    }

}
