<?php

namespace CoinForBarter\V1\Lib;

class Payment
{
  private $path = '/payments/';
  private $request;

  function __construct($request, $publicKey)
  {
    $this->request = $request;
  }

  function create(
    $body
  ) {
    $request =  $this->request->call(
      $this->path . '/api',
      'post',
      $body,
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

  function setCurrency(
    $id,
    $currency,
    $network
  ) {
    $request = $this->request->call(
      $this->path . $id . '/currency/set/' . $currency . $network,
      'patch',
      [],
      true,
    );
    return $request;
  }

  function cancel(
    $id
  ) {
    $request = $this->request->call(
      $this->path . $id . '/cancel',
      'patch',
      [],
      true,
    );
    return $request;
  }

  function lockCurrency(
    $id
  ) {
    $request = $this->request->call(
      $this->path . $id . '/currency/lock',
      'patch',
      [],
      true,
    );
    return $request;
  }

  // function getPaymentUpdates(
  //   $paymentId
  // ) {
  //   $request = $this->request->call(
  //     $this->path . $bankAccountId,
  //     'get',
  //     [],
  //     true,
  //   );
  //   return $request;
  // }
}
