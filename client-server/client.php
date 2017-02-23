<?php

$host='tcp://127.0.0.1:5555';
$message='Client message at '.time();

$context=new ZMQContext();
$client=new ZMQSOcket($context, ZMQ::SOCKET_REQ);
$client->connect($host);


echo "Connected ".$host."\n";

$client->send($message);

echo "Send ".$host."\n";

echo 'Server sent : "'.$client->recv().'"'."\n";

//echo "Receive ".$host."\n";



