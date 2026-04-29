<?php
// Define que a resposta será um JSON e permite acesso de diferentes origens (CORS)
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

/**
 * Lógica de busca:
 * Se o usuário enviar um parâmetro 'nome', buscamos esse Pokémon.
 * Caso contrário, buscamos um Pokémon aleatório (ex: ID entre 1 e 151).
 */
$pokemonBuscado = isset($_GET['nome']) ? strtolower(trim($_GET['nome'])) : rand(1, 151);

// URL da PokeAPI
$url = "https://pokeapi.co/api/v2/pokemon/" . $pokemonBuscado;

// Tenta buscar os dados da API
$response = @file_get_contents($url);

if ($response === FALSE) {
    // Se a API não encontrar o Pokémon ou estiver fora do ar
    echo json_encode([
        'success' => false,
        'mensagem' => 'Pokémon não encontrado. Verifique o nome e tente novamente!'
    ]);
    exit;
}

$dados = json_decode($response, true);

// Preparamos apenas os dados que nos interessam para facilitar o trabalho do Front-end
$resultado = [
    'success' => true,
    'nome'    => ucfirst($dados['name']),
    'id'      => $dados['id'],
    'imagem'  => $dados['sprites']['other']['official-artwork']['front_default'], // Imagem de alta qualidade
    'tipo'    => ucfirst($dados['types'][0]['type']['name']),
    'peso'    => $dados['weight'] / 10 . ' kg', // A API traz em decigramas
    'altura'  => $dados['height'] / 10 . ' m'   // A API traz em decímetros
];

echo json_encode($resultado);