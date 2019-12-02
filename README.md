# WAPLUGIN PHP Library

## Installation
```ssh
composer require wapluginlab/php-lib
```

## Account
### Get Account
```php
use Waplugin\Config;
use Waplugin\Account;

$params['page'] = 1;

Config::$secretKey = getenv('SECRET_KEY');

$result = Account::index($params);

return $result;
```

### View Account Detail
```php
use Waplugin\Config;
use Waplugin\Account;

$account_id = 1;

Config::$secretKey = getenv('SECRET_KEY');

$result = Account::show($account_id);

return $result;
```

## WhatsApp
### Status
```php
use Waplugin\Config;
use Waplugin\Wa;

$account_id = 1;

Config::$secretKey = getenv('SECRET_KEY');

$result = Wa::status($account_id);

return $result;
```

### Send Message
```php
use Waplugin\Config;
use Waplugin\Wa;

$account_id = 1;

$params['phone'] = '6281xxxxxx';
$params['msg'] = 'Lorem Ipsum Dolar Sit Maet';

Config::$secretKey = getenv('SECRET_KEY');

$result = Wa::send($account_id, $params);

return $result;
```

[Official API Docs](https://waplugin.com/apidoc/#introduction)