<?php

namespace Coinforbarter\Sdk;

class BankAccount
{
  private $path = '/bank-accounts';
  private $request;

  function __construct($request)
  {
    $this->request = $request;
  }

  function getBankAccountName(
    $body
  ) {
    $request =  $this->request->call(
      $this->path . '/account/name',
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

  function getBanks(
    $countryCode
  ) {
    $request = $this->request->call(
      $this->path . '/banks' . $countryCode,
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
      $this->path . '/primary' . $bankAccountId,
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
