<?php

$apiKey = 'df486576-1cd4-4c80-b124-78e5f22587ea'; // insira sua chave da API aqui

// url do webhook https://webhook.site/ + api key
$url = "https://webhook.site/$apiKey";

// random data to be sent to the webhook in json format
$data = array(
	'id' => rand(1, 1000),
	'nome' => 'Fulano de Tal',
	'email' => 'teste@email.com',
	'telefone' => '11999999999',
	'cidade' => 'São Paulo',
	'estado' => 'SP',
	'pais' => 'Brasil',
	'cep' => '00000-000',
	'data_nascimento' => '01/01/2000'
);

// converte o array em json
$data_string = json_encode($data);

// inicia a sessão cURL
$ch = curl_init($url);

// configura as opções da sessão cURL
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt(
	$ch,
	CURLOPT_HTTPHEADER,
	array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string)
	)
);

// executa a sessão cURL
$result = curl_exec($ch);

// fecha a sessão cURL
curl_close($ch);

// exibe o resultado
echo $result;
