<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use CoinForBarter\V1\CoinFOrBarter;


/**
 * Get akk countries
 */
function getCountries()
{
    $private_key = "xxxxxxxxxxxxxxxxxxxx";
    $public_key = "xxxxxxxxxxxxxxxxxxxxx";

    $coinforbarter =  new CoinForBarter($public_key, $private_key, '');
    $resp = $coinforbarter->Misc->getCountries();

    print json_encode($resp);
}



/**
 * Get all countries
 */
function getCurrencies()
{
    $private_key = "xxxxxxxxxxxxxxxxxxxx";
    $public_key = "xxxxxxxxxxxxxxxxxxxxx";

    $coinforbarter =  new CoinForBarter($public_key, $private_key, '');
    $resp = $coinforbarter->Misc->getCurrencies();

    print json_encode($resp);
}
