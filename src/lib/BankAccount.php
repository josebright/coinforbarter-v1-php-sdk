<?php

namespace CoinForBarter\V1\Lib;

class BankAccount
{
  private $path = '/bank-accounts/';
  private $request;

  function __construct($request)
  {
    $this->request = $request;
  }

  function getBankAccountName(
    $body
  ) {
    $request =  $this->request->call(
      $this->path . 'account/name',
      'post',
      $body,
      true,
    );
    return $request;
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

  // function getBanks(
  //   $countryCode
  // ) {
  //   $request = $this->request->call(
  //     $this->path . 'banks/' . $countryCode,
  //     'get',
  //     [],
  //     true,
  //   );
  //   return $request;
  // }

  // function makePrimary(
  //   $bankAccountId
  // ) {
  //   $request = $this->request->call(
  //     $this->path . 'primary/' . $bankAccountId,
  //     'get',
  //     [],
  //     true,
  //   );
  //   return $request;
  // }
}
