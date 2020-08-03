# Documentation
### Warning! This is a previous version of API! New version avaliable in v3 branch [here](https://github.com/aff1-cpa/publisher-api/tree/v3).
## Requirement:

* php: >= 5.3.0
* ext-curl: *

## Installation and usage:

### Manually
Download the file PublisherApi.php and place it in one directory with the file for the successful creation of the order.

### Composer

```bash
composer require aff1/publisher-api:^2
```
In the order creation file, paste this code:
```php

require('PublisherApi.php');

$api = new \Aff1\PublisherApi();

$api->setApiKey('{YOUR_API_KEY}');
$api->setTargetHash('{TARGET_HASH}');
$api->setCountryCode('{COUNTRY_CODE}');

$api->makeOrder($_POST['name'], $_POST['phone']);

Note: It is assumed that the form has name fields for the name of the buyer,
and phone - the phone number of the buyer. The form is sent by the POST method.
```

#Документация
### Внимание! Это предыдущая версия API! Новая версия доступна в v3 ветке [здесь](https://github.com/aff1-cpa/publisher-api/tree/v3).

## Требования:

* php: >= 5.3.0
* ext-curl: *

## Установка и использование:

### Ручная установка
Скачайте файл PublisherApi.php и расположите его в одной директории с файлом успешного создания заказа.
### Composer

```bash
composer require aff1/publisher-api:^2
```

В файле успешного создания заказа вставьте код:
```php
$api = new \Aff1\PublisherApi();

$api->setApiKey('{YOUR_API_KEY}');
$api->setTargetHash('{TARGET_HASH}');
$api->setCountryCode('{COUNTRY_CODE}');

Создание заказа:
$api->makeOrder($_POST['name'], $_POST['phone']);

Примечание: Предполагается, что форма имеет поля name для имени покупателя,
и phone - номер телефона покупателя. Форма отправляется методом POST.
```