<?php

require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://sandbox.api.pagseguro.com/public-keys', [
  'body' => '{"type":"card"}',
  'headers' => [
    'Authorization' => 'Bearer <token>',
    'accept' => 'application/json',
    'content-type' => 'application/json',
  ],
]);

echo $response->getBody();