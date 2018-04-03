<?php

namespace Src\Core {
	class Client {
		public  $port = 9999;
		public  $host = "0.0.0.0";
		private $socket;
			
		private $errcode;
		private $errmsg;
		
		private function server(){
			$this->socket = socket_create(AF_INET, SOCK_DGRAM, 0);
			
			$this->errcode = socket_last_error();
			$this->errmsg = socket_strerror($this->errcode);
			
			return $this->socket;
		}
		
		private function dump(){
			if(!$this->server()){
				die("Couldn't create socket: [{$this->errcode}] {$this->errmsg} \n");
			}			
			
			while(1){
				echo 'Enter a message to send : ';
				$shell = fgets(STDIN);
				
				if(!socket_sendto($this->socket, $shell, strlen($shell), 0, $this->host, $this->port)){
					$this->errcode = socket_last_error();
					$this->errmsg = socket_strerror($this->errcode);
					 
					die("Could not send data: [{$this->errcode}] {$this->errmsg} \n");
				}
				
				if(socket_recv($this->socket, $reply, 2045, MSG_WAITALL) === false){
					$this->errcode = socket_last_error();
					$this->errmsg = socket_strerror($this->errcode);
					 
					die("Could not receive data: [{$this->errcode}] {$this->errmsg} \n");
				}
				
				echo "Reply : $reply";
			}
		}
		
		public function conn(){
			$this->dump();
		}
	}
}

