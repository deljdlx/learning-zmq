<?php

$host='tcp://127.0.0.1:5555';
$message='hello world';

$context=new ZMQContext();
$client=new ZMQSOcket($context, ZMQ::SOCKET_REQ);
$client->connect($host);


echo "Connected ".$host."\n";

$client->send($message);

echo "Send ".$host."\n";

echo $client->recv();

echo "Receive ".$host."\n";



