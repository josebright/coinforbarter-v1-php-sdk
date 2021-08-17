# CoinForBarter
CoinForBarter V1 PHP Library is an MIT-licensed open source project. It can grow, thanks to the sponsors and support by the amazing backers. If you'd like to join them, please [read more here](https://documentation.coinforbarter.com/community).

## Installation
This project using composer.
```
$ composer require coinforbarter/coinforbarter-v1-php
```

## Usage
Integrate coinforbarter sdk.
```php
<?php

use Coinforbarter\V1;

$coinforbarter = new CoinForBarter('publicKey', 'secretKey', 'encryptionKey');
echo $coinforbarter->test();
```

## Stay in touch

- Author - [Ugwumadu, Uchenna Bright](https://www.linkedin.com/in/josebright)
- Website - [https://coinforbarter.com](https://coinforbarter.com)
- Twitter - [@c4b](https://twitter.com/c4b)

## License

CoinForBarter is [MIT licensed](LICENSE).