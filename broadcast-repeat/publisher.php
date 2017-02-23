<?php

include(__DIR__.'/configuration.php');


$contextListener=new ZMQContext();



$listener=new ZMQSocket($contextListener, ZMQ::SOCKET_REP);
$listener->bind($listenerHost);



$contextBroadcast=new ZMQContext();
$broadcaster=new ZMQSocket($contextBroadcast, ZMQ::SOCKET_PUB);
$broadcaster->bind($broadcasterHost);


while(true) {
	$message=$listener->recv();
	echo 'Received "'.$message.'"'."\n";
	
	$listener->send('');
	
	//$listener->send('Server received "'.$message.'"');
	$broadcaster->send($subscriptionName.'@'.$message);

	
	
}


