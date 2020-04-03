<?php

include 'PublisherApi.php';

# Set name and phone of user
$client = $_REQUEST['client'];
$phone = $_REQUEST['phone'];
$phone2 = $_REQUEST['phone2'];

# Set API key
$api_key = 'API_KEY';

# Set country and target
$country_code = 'COUNTY_CODE';
$target_hash = 'TARGET_HASH';

$api = new \Aff1\PublisherApi();

$api->setApiKey($api_key);
$api->setTargetHash($target_hash);
$api->setCountryCode($country_code);

$api->makeOrder($client, $phone, $phone2);
