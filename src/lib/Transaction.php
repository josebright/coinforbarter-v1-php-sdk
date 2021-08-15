<?php

namespace Coinforbarter\Sdk;

class Transaction
{
  private $path = '/transactions';
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

  function verify(
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

  function events(
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

  function getFee(
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

  function webhook(
    $id
  ) {
    $request = $this->request->call(
      $this->path . $id . '/webhook',
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