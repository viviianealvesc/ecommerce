<?php

define('token', '5CDFE1B717394FBCB659BACF6D2572C7');
define('url', 'https://sandbox.api.pagseguro.com/orders');

$data['reference_id'] = "ex-00001";
$data['customer'] = [
    "name" => "Jose da Silva",
    "email" => "email@test.com",
    "tax_id" => "12345678909",
    "phones" => [ 
            "country" => "55",
            "area" => "11",
            "number" => "999999999",
            "type" => "MOBILE"
     ]
];

$data['items'] = [
    "reference_id" => "referencia do item",
    "name" => "nome do item",
    "quantity" => 1,
    "unit_amount" => 500
];

$data['shipping'] = [
    "address" => [
        "street" => "Avenida Brigadeiro Faria Lima",
        "number" => "1384",
        "complement" => "apto 12",
        "locality" => "Pinheiros",
        "city" => "São Paulo",
        "region_code" => "SP",
        "country" => "BRA",
        "postal_code" => "01452002"
     ]
];

$data['notification_urls'] = [
    "https://meusite.com/notificacoes" //url de onde eu quero que envie a mensagem
];

$data['charges'] = [
    "reference_id" => "referencia da cobranca",
    "description" => "descricao da cobranca",
    "amount" => [
        "value" => 500,
        "currency" => "BRL"
    ],
    "payment_method" => [
        "type" => "CREDIT_CARD",
        "installments" => 1,
        "capture" => true,
        "card" => [
            "encrypted" => "V++53ir0qvoK/rUSzNjCqP8Hz9ZTa+HohR779n63CV+NvCeYj4J4lQevL4NKN7Di3BxKQGqfQW5cfS7/4rHw4w8URuOV/j/mGau2GXxkKQ6/szJ6BQr//C4e4XgfCHDwcONQhuPDHMdOB1C+4lzyBbsPJUZ/8TUQrxhMMiMFjwGeg62uf7cUqdFjp+Q5dqJXwhLgH3d1EoX+JKStBLqVzF0lW3gHtFOyfvFhuxxBgB0xrzTKfbTqnL5aSYBoGXRFM0gLodMm6knx7bW+syThxyQffnaigCwj2aNohsu+fuXII+3WnlgrHQxaBx3ChRuWKy+loV2L2USiGulp/bPEcg==",
            "store" => false
        ],
          "holder" => [
          "name" => "Jose da Silva",
          "tax_id" => "65544332211"
     ]
 ]
];

$data = json_encode($data);
