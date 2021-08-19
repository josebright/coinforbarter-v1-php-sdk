<?php

namespace Coinforbarter\V1;

class WalletAddress
{
  private $path = '/wallet-addresses';
  private $request;

  function __construct($request)
  {
    $this->request = $request;
  }

  function create(
    $body
  ) {
    $request =  $this->request->call(
      $this->path,
      'post',
      $body,
      true,
    );
    var_dump($request);
    return [
      "status" => $request->status,
      "message" => $request->message,
      "statusCode" => $request->statusCode,
      "data" => $request->data,
    ];
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
    var_dump($request);
    return [
      "status" => $request->status,
      "message" => $request->message,
      "statusCode" => $request->statusCode,
      "data" => $request->data,
    ];
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
    return [
      "status" => $request->status,
      "message" => $request->message,
      "statusCode" => $request->statusCode,
      "data" => $request->data,
    ];
  }

  function makePrimary(
    $bankAccountId
  ) {
    $request = $this->request->call(
      $this->path  . '/primary' . $bankAccountId,
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
}