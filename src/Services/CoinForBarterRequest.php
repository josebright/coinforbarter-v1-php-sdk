<?php

namespace CoinForBarter\V1\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CoinForBarterRequest
{

  private $url = 'https://api.coinforbarter.com/';

  function __construct(
    $public_key,
    $private_key
  ) {
    $this->public_key = $public_key;
    $this->private_key = $private_key;
  }

  function call(
    $path = '',
    $method = 'get',
    $body = [],
    $useToken = false
  ) {
    try {
      $client = new Client([
        'base_uri' => $this->url,
        'timeout'  => 2.0,
      ]);
      $headers = [
        "Authorization" => "Bearer $this->private_key",
      ];
      if ($useToken === false) {
        $headers = [];
      }
      $response = null;
      if ($method === 'delete') {
        $response = $client->request('DELETE', 'v1' . $path, ['headers' => $headers]);
      }
      if ($method === 'get') {
        $response = $client->request('GET', 'v1' . $path, ['headers' => $headers]);
      }
      if ($method === 'patch') {
        $response = $client->request('PATCH', 'v1' . $path, ['json' => $body, 'headers' => $headers]);
      }
      if ($method === 'post') {
        $response = $client->request('POST', 'v1' . $path, ['json' => $body, "headers" => $headers]);
      }

      $statusCode = $response->getStatusCode();


      if ($statusCode === 204) {
        return [
          "data" => null,
          "statusCode" => 204,
          "message" => '',
          "status" => 'success'
        ];
      }

      $response = $response->getBody();


      $response = json_decode($response);
      if ($response) {
        return [
          "data" => $response->data ?? null,
          "statusCode" => $statusCode,
          "message" => $response->message,
          "status" => $response->status ?? 'error'
        ];
      }
      return [
        "data" => null,
        "statusCode" => $statusCode,
        "message" => 'an error occurred, check your internet connection',
        "status" =>  'error'
      ];
    } catch (RequestException $e) {
      $statusCode = $e->getResponse()->getStatusCode();
      $body = $e->getResponse()->getBody()->getContents();
      $body = json_decode($body);
      if ($statusCode) {
        if ($statusCode === 401) {
          return [
            "data" => null,
            "statusCode" => 401,
            "message" => 'Invalid api key',
            "status" => 'error'
          ];
        }
        return [
          "data" => $body->data ?? null,
          "statusCode" => $statusCode,
          "message" => $body->message,
          "status" => 'error'
        ];
      }

      return [
        "data" => null,
        "statusCode" => null,
        "message" => 'an error occurred',
        "status" => 'error'
      ];
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
