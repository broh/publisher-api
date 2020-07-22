<?php

include 'PublisherApi.php';

# Set name and phone of user
$client = isset($_REQUEST['client']) ? $_REQUEST['client'] : '';
$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';

# Set API key, target and country
$api_key = '{YOUR_API_KEY}';
$target_hash = '{TARGET_HASH}';
$country_code = '{COUNTY_CODE}';

$api = new \Aff1\PublisherApi();

$api->setProperty('api_key', $api_key);
$api->setProperty('target_hash', $target_hash);
$api->setProperty('country_code', $country_code);

$api->makeOrder($client, $phone);
