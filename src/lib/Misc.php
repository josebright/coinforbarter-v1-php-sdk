<?php

namespace CoinForBarter\V1\Lib;

class Misc
{
  private $path = '/currencies/';
  private $request;

  function __construct($request)
  {
    $this->request = $request;
  }

  function getCountries(
  ) {
    $request = $this->request->call(
      '/countries',
      'get',
    );
    return $request;
  }

  function getBalance(
  ) {
    $request = $this->request->call(
      '/balances',
      'get',
      [],
      true,
    );
    return $request;
  }

  function getCurrencies(
    $query
  ) {
    $query_string = $this->request->makeQueryString($query);
    $request =  $this->request->call(
      "$this->path" . $query_string,
      'get',
    );
    return $request;
  }
}