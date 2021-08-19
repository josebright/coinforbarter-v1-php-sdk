<?php

namespace Coinforbarter\V1;

class Payment
{
  private $path = '/payments';
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

  function setCurrency(
    $id,
    $currency,
    $network
  ) {
    $request = $this->request->call(
      $this->path . $id . '/currency/set' . $currency . $network,
      'patch',
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

  function cancel(
    $id
  ) {
    $request = $this->request->call(
      $this->path . $id . '/cancel',
      'patch',
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

  function lockCurrency(
    $id
  ) {
    $request = $this->request->call(
      $this->path . $id . '/currency/lock',
      'patch',
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

  // function getPaymentUpdates(
  //   $paymentId
  // ) {
  //   $request = $this->request->call(
  //     $this->path . $bankAccountId,
  //     'get',
  //     [],
  //     true,
  //   );
  //   return [
  //     "status" => $request->status,
  //     "message" => $request->message,
  //     "statusCode" => $request->statusCode,
  //     "data" => $request->data,
  //   ];
  // }
}
