<?php

namespace CoinForBarter\V1\Services;


class CoinForBarterRequest
{

  private $url = 'https://staging-api.coinforbarter.com/v1';

  function __construct(
    $publicKey,
    $secretKey
  ) {
    $this->publicKey = $publicKey;
    $this->secretKey = $secretKey;
  }

  function call(
    $path = '',
    $method = 'get',
    $body = [],
    $useToken = false
  ) {
    try {
      $request  = curl_init();
      $url = $this->url . $path;
      curl_setopt($request, CURLOPT_URL, $url);
      curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
      $headers = [
        "Authorization: Bearer $this->secretKey",
        "Content-Type: contentType",
      ];
      if ($useToken === false) {
        $headers = [
          "Authorization: Bearer $this->secretKey",
          "Content-Type: text/json"
        ];
      }
      curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
      if ($method === 'delete') {
        curl_setopt($request, CURLOPT_CUSTOMREQUEST, "DELETE");
      }
      if ($method === 'patch') {
        curl_setopt($request, CURLOPT_CUSTOMREQUEST, "PATCH");
      }
      if ($method === 'post') {
        curl_setopt($request, CURLOPT_POST, 1);
        curl_setopt(
          $request,
          CURLOPT_POSTFIELDS,
          $body
        );
      }
      $response = curl_exec($request);
      $statusCode = curl_getinfo($request, CURLINFO_HTTP_CODE);
      curl_close($request);
      if ($statusCode === 401) {
        return [
          "data" => null,
          "statusCode" => 401,
          "message" => 'Invalid api key',
          "status" => 'error'
        ];
      }
      if ($statusCode === 204) {
        return [
          "data" => null,
          "statusCode" => 204,
          "message" => '',
          "status" => 'success'
        ];
      }
      $response = json_decode($response);
      return $response;
      return [
        "data" => $response->data,
        "statusCode" => $statusCode,
        "message" => $response->message,
        "status" => $response->status
      ];
    } catch (Exception $e) {
      if ($e->response->status && $e->response->data) {
        extract($e->response);
        return [
          "data" => $e->response->data,
          "statusCode" => $e->response->status,
          "message" => $e->response->message,
          "status" => 'error'
        ];
      }
      return [
        "data" => null,
        "statusCode" => null,
        "message" => 'an error occurred',
        "status" => 'error'
      ];
      return $e;
    }
  }


  function makeQueryString($query)
  {
    $query_array = [];
    foreach ($query as $key => $value) {
      array_push($query_array, "$key=$value");
    }
    return count($query_array) > 0 ? "?" . join("&", $query_array) : '';
  }
}
