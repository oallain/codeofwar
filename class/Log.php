<?php

class Log {

    static function write($message) {

        if (is_string($message)) {
            echo $message;
        } else {
            var_dump($message);
        }
        echo "\n";
    }

}
