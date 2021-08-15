<?php

namespace Coinforbarter\Sdk;

use CoinForBarterRequest;
use Customer;

$secretKey = "";
$publicKey = "";
$request =  new CoinForBarterRequest($secretKey, $publicKey);
$id = "";
$customer = new Customer($request);
$resp = $customer->findOne($id);
if ($resp['status'] === $coinforbarter_status->success) {
    print "findOne success <br />";
} else {
    print "findOne error <br />";
}
