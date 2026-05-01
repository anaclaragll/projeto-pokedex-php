<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$pokemonBuscado = isset($_GET['nome']) ? strtolower(trim($_GET['nome'])) : rand(1, 151);


$url = "https://pokeapi.co/api/v2/pokemon/" . $pokemonBuscado;

$response = @file_get_contents($url);

if ($response === FALSE) {
    
    echo json_encode([
        'success' => false,
        'mensagem' => 'Pokémon não encontrado. Verifique o nome e tente novamente!'
    ]);
    exit;
}

$dados = json_decode($response, true);

$resultado = [
    'success' => true,
    'nome'    => ucfirst($dados['name']),
    'id'      => $dados['id'],
    'imagem'  => $dados['sprites']['other']['official-artwork']['front_default'], 
    'tipo'    => ucfirst($dados['types'][0]['type']['name']),
    'peso'    => $dados['weight'] / 10 . ' kg', 
    'altura'  => $dados['height'] / 10 . ' m'   
];

echo json_encode($resultado);