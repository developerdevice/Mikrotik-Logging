<?php
#!/usr/bin/env php

namespace Src\Core {
	class Socket {
		public  $listen = 9999;
		public  $bindomain = "0.0.0.0";
		private $socket;
		private $bind;
			
		private $errcode;
		private $errmsg;
		
		private function server(){
			$this->socket = socket_create(AF_INET, SOCK_DGRAM, 0);
			
			$this->errcode = socket_last_error();
			$this->errmsg = socket_strerror($this->errcode);
			
			return $this->socket;
		}
		
		private function bind(){
			$this->bind = socket_bind($this->socket, $this->bindomain, $this->listen);
			
			$this->errcode = socket_last_error();
			$this->errmsg = socket_strerror($this->errcode);
			
			return $this->bind;
		}
		
		private function dump(){
			if(!$this->server()){
				die("Couldn't create socket: [{$this->errcode}] {$this->errmsg} \n");
			}			
			
			if(!$this->bind()){
				die("Couldn't create socket: [{$this->errcode}] {$this->errmsg} \n");
			}
			
			echo "Waiting for data ... \n\r";
			
			while(1){
				//Receive some data
				$r = socket_recvfrom($this->socket, $buf, 512, 0, $remote_ip, $remote_port);
				echo "{$remote_ip} : {$remote_port} -- " . $buf. PHP_EOL;
				 
				//Send back the data to the client
				socket_sendto($sock, "OK " . $buf , 100 , 0 , $remote_ip, $remote_port);
			}
		}
		
		public function run(){
			$this->dump();
		}
	}
}

