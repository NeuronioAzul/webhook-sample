<?php


$apiKey = 'df486576-1cd4-4c80-b124-78e5f22587ea'; // insira sua chave da API aqui


// url para obter a ultima requisição
$url = "https://webhook.site/token/$apiKey/request/latest/raw";

// Inicializa a sessão cURL
$ch = curl_init($url);

// Configura as opções da requisição
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
	"Content-Type: application/json",
	"api-key: $apiKey"
]);

// Executa a requisição
$response = curl_exec($ch);

// Fecha a sessão cURL
curl_close($ch);

// decodifica a resposta
$response = json_decode($response, true);

// exibe a resposta
echo '<pre>';
print_r($response);
echo '</pre>';