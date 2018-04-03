<?php 
#!/usr/bin/env php

require_once '../vendor/autoload.php';

error_reporting(0);

$client = new \Src\Core\Client;
$client->port    = 9999;
$client->host = "192.168.1.254";

$client->conn();
