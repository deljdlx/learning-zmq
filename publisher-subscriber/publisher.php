<?php

$host='tcp://127.0.0.1:5555';
$subscriptionName='testSubcription';



$context=new ZMQContext();


$server=$context->getSocket(ZMQ::SOCKET_PUB);

$server->bind($host);



echo "Connected ".$host."\n";

while(true) {

	$message='Here server at '.time();

	echo "Sending ".$message."\n";
	//$server->send('john', ZMQ::MODE_SNDMORE);
	$server->send($subscriptionName.'@'.$message);
	sleep(1);
}


