<?php

$host='tcp://127.0.0.1:5555';

$context=new ZMQContext();


$server=new ZMQSocket($context, ZMQ::SOCKET_REP);
$server->bind($host);

echo "Connected ".$host."\n";

while(true) {

	$message=$server->recv();
	
	echo 'Received "'.$message.'"'."\n";
	
	$server->send('Server received "'.$message.'"');
}


