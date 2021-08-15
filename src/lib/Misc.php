<?php

namespace Coinforbarter\Sdk;

class Misc
{
  private $path = '/currencies';
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
    return [
      "status" => $request->status,
      "message" => $request->message,
      "statusCode" => $request->statusCode,
      "data" => $request->data,
    ];
  }

  function getBalance(
  ) {
    $request = $this->request->call(
      '/balances',
      'get',
      [],
      true,
    );
    return [
      "status" => $request->status,
      "message" => $request->message,
      "statusCode" => $request->statusCode,
      "data" => $request->data,
    ];
  }

  function getCurrencies(
    $query
  ) {
    $query_string = $this->request->makeQueryString($query);
    $request =  $this->request->call(
      "$this->path" . $query_string,
      'get',
    );
    var_dump($request);
    return [
      "status" => $request->status,
      "message" => $request->message,
      "statusCode" => $request->statusCode,
      "data" => $request->data,
    ];
  }
}
