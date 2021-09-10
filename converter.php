<?php
$json = file_get_contents('php://input');
$ttnpacket = json_decode($json, true);

$devid=$ttnpacket["end_device_ids"]["device_id"];
$latitude=$ttnpacket["uplink_message"]["decoded_payload"]["latitude"];
$longitude=$ttnpacket["uplink_message"]["decoded_payload"]["longitude"];
$timestamp=$ttnpacket["received_at"];
$signalstrength=$ttnpacket["uplink_message"]["rx_metadata"][0]["rssi"];
$gateway=$ttnpacket["uplink_message"]["rx_metadata"][0]["gateway_ids"]["gateway_id"];

$response = file_get_contents("http://127.0.0.1:5055/?id=$devid&lat=$latitude&lon=$longitude&timestamp=$timestamp&rssi=$signalstrength&gateway=$gateway");

?>
