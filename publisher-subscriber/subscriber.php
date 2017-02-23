<?php

$host='tcp://127.0.0.1:5555';
$subscriptionName='testSubcription';


$context=new ZMQContext();


$client=$context->getSocket(ZMQ::SOCKET_SUB);
$client->connect($host);

$client->setSockOpt(ZMQ::SOCKOPT_SUBSCRIBE, $subscriptionName);



echo "Connected ".$host."\n";

while(true) {

	$message=$client->recv();
	echo preg_replace('`^.*?@`', '', $message)."\n";
	sleep(rand(0,5));
}


