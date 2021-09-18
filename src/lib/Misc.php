<?php

namespace CoinForBarter\V1\Lib;

class Misc
{
  private $request;

  function __construct($request)
  {
    $this->request = $request;
  }

  function getCountries()
  {
    $request = $this->request->call(
      '/countries',
      'get',
    );
    return $request;
  }

  function getBalance()
  {
    $request = $this->request->call(
      '/balances',
      'get',
      [],
      true,
    );
    return $request;
  }

  function getCurrencies()
  {
    $request =  $this->request->call(
      "/currencies",
      'get',
    );
    return $request;
  }
}
