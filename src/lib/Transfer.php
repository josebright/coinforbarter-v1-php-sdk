<?php

namespace CoinForBarter\V1\Lib;

class Transfer
{
  private $path = '/transfers/';
  private $feePath = '/transfers/fee/';
  private $otpPath = '/transfers/otp/';
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
    return $request;
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

  function getFee(
    $body
  ) {
    $request = $this->request->call(
      $this->feePath,
      'post',
      $body,
      true,
    );
    return $request;
  }
}