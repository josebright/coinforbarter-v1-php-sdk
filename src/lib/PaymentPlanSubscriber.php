<?php

namespace CoinForBarter\V1\Lib;

class PaymentPlanSubscriber
{
  private $path = '/payment-plan-subscribers';
  private $request;

  function __construct($request)
  {
    $this->request = $request;
  }

  function create(
    $body,
    $paymentPlanId
  ) {
    $request =  $this->request->call(
      $this->path . $paymentPlanId,
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

  function remove(
    $id
  ) {
    $request = $this->request->call(
      $this->path . $id,
      'delete',
      $body,
      true,
    );
    return $request;
  }
}