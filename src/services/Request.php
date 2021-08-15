<?php

namespace Coinforbarter\Sdk;


class CoinForBarterRequest
{

  private $url = 'http://127.0.0.1:8000/v1';

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
          "Authorization: Bearer $this->secretKey"
        ];
      }
      curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
      if ($method == 'delete') {
        curl_setopt($request, CURLOPT_CUSTOMREQUEST, "DELETE");
      }
      if ($method == 'patch') {
        curl_setopt($request, CURLOPT_CUSTOMREQUEST, "PATCH");
      }
      if ($method === 'post') {
        curl_setopt($request, CURLOPT_POST, 1);
        curl_setopt(
          $request,
          CURLOPT_POSTFIELDS,
          json_encode($body)
        );
      }
      $response = curl_exec($request);
      curl_close($request);
      require "../types/response.types.php";
      $status = $coinforbarter_status->success;
      if ($request->status === 204) {
        return [
          "data" => null,
          "statusCode" => $statusCode,
          "message" => '',
          "status" => $status
        ];
      }
      var_dump($response);
      return [
        "data" => $data,
        "statusCode" => $statusCode,
        "message" => $message,
        "status" => $status
      ];
    } catch (Exception $e) {
      $status =  $coinforbarter_status->error;
      if ($e->response->status && $e->response->data) {
        extract($e->response);
        return [
          "data" => $data,
          "statusCode" => $statusCode,
          "message" => $message,
          "status" => $status
        ];
      }
      return [
        "data" => null,
        "statusCode" => null,
        "message" => 'an error occurred',
        "status" => $status
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
