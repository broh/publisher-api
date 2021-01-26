<?php

include("src/PublisherApi.php");

$api = new \Aff1\PublisherApi();

$api->setProperty('api_key', '{API_KEY}');
$api->setProperty('flow_hash', '{FLOW_HASH}');
$api->setProperty('target_hash', '{TARGET_HASH}');
$api->setProperty('country_code', request('country_code'));
$api->setProperty('first_name', custom('first_name'));
$api->setProperty('last_name', custom('last_name'));
$api->setProperty('address', request('address'));
$api->setProperty('state', custom('state'));
$api->setProperty('city', custom('city'));
$api->setProperty('zipcode', custom('zipcode'));
$api->setProperty('email', request('email'));
$api->setProperty('comment', request('comment'));
$api->setProperty('size', custom('size'));
$api->setProperty('quantity', custom('quantity'));
$api->setProperty('password', custom('password'));
$api->setProperty('language', custom('language'));
$api->setProperty('browser_locale', $api->getBrowserLocale());
$api->setProperty('phone2', request('phone2'));

if (isset($_REQUEST["clickid"])) {
    $api->setProperty("clickid", $_REQUEST["clickid"]);
}

if (isset($_REQUEST["data1"])) {
    $api->setProperty("data1", $_REQUEST["data1"]);
}

if (isset($_REQUEST["data2"])) {
    $api->setProperty("data2", $_REQUEST["data2"]);
}

if (isset($_REQUEST["data3"])) {
    $api->setProperty("data3", $_REQUEST["data3"]);
}

if (isset($_REQUEST["data4"])) {
    $api->setProperty("data4", $_REQUEST["data4"]);
}

$response = $api->makeOrder(request('client'), request('phone'));

$response = json_decode($response, true);

if ($response['status'] !== 'success') {
    die(var_dump($response));
}

die(showSuccessPage());

/** Functions */
function showSuccessPage()
{
    $data_params = array();

	if (isset($_REQUEST["clickid"])) {
		$data_params["clickid"] = $_REQUEST["clickid"];
	}

	if (isset($_REQUEST["data1"])) {
		$data_params["data1"] = $_REQUEST["data1"];
	}

	if (isset($_REQUEST["data2"])) {
		$data_params["data2"] = $_REQUEST["data2"];
	}

	if (isset($_REQUEST["data3"])) {
		$data_params["data3"] = $_REQUEST["data3"];
	}

	if (isset($_REQUEST["data4"])) {
		$data_params["data4"] = $_REQUEST["data4"];
	}

    header(
        'Location: success.html?' .
        http_build_query(array_merge(
            $_GET,
            array('name' => request('client'), 'phone' => $_POST['phone'],
            $data_params
        )))
    );
}

function request($field)
{
    return isset($_REQUEST[$field]) ? $_REQUEST[$field] : '';
}

function custom($field)
{
    return isset($_REQUEST['custom'], $_REQUEST['custom'][$field]) ? $_REQUEST['custom'][$field] : '';
}