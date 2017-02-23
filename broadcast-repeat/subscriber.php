<?php


include(__DIR__.'/configuration.php');


$message='Client message at '.time();



$context=new ZMQContext();
$writeClient=new ZMQSOcket($context, ZMQ::SOCKET_REQ);
$writeClient->connect($listenerHost);



$readClient=new ZMQSOcket($context, ZMQ::SOCKET_SUB);
$readClient->setSockOpt(ZMQ::SOCKOPT_SUBSCRIBE, $subscriptionName);
$readClient->connect($broadcasterHost);



$writeClient->send($message);
echo 'Server sent : "'.$writeClient->recv().'"'."\n";


while(true) {
	$message=$readClient->recv();
	echo preg_replace('`^.*?@`', '', $message)."\n";
	sleep(rand(0,5));
}






return;


//$client=$context->getSocket(ZMQ::SOCKET_SUB);
//$client->connect($host);

$client->setSockOpt(ZMQ::SOCKOPT_SUBSCRIBE, $subscriptionName);



echo "Connected ".$host."\n";








//echo "Receive ".$host."\n";



