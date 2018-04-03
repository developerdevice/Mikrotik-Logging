<?php 
#!/usr/bin/env php

require_once '../vendor/autoload.php';

error_reporting(0);

$socket = new \Src\Core\Socket;
$socket->listen    = 514;
$socket->bindomain = "0.0.0.0";
$socket->run();
