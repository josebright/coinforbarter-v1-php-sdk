<?php

namespace CoinForBarter\V1\Lib;

class Payout
{
  private $path = '/payouts/';
  private $request;

  function __construct($request)
  {
    $this->request = $request;
  }

  function findAll(
    $query
  ) {
    $query_string = $this->request->makeQueryString($query);
    $request =  $this->request->call(
      "$this->path" . $query_string,
      'get',
      [],
      true,
    );
    return $request;
  }

  function findOne(
    $id
  ) {
    $request = $this->request->call(
      $this->path . $id,
      'get',
      [],
      true,
    );
    return $request;
  }
}