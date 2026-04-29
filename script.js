async function buscarPokemon() {
    const nome = document.getElementById('campo-busca').value.toLowerCase();
    const cartao = document.getElementById('cartao-pokemon');
    const erroMsg = document.getElementById('mensagem-erro');

    try {
        // Faz a chamada para o SEU arquivo PHP, passando o nome buscado
        const resposta = await fetch(`api.php?nome=${nome}`);
        const dados = await resposta.json();

        if (dados.success) {
            // Se deu certo, esconde o erro e mostra o cartão
            erroMsg.classList.add('escondido');
            cartao.classList.remove('escondido');

            // Preenche os campos com os dados que o PHP enviou
            document.getElementById('poke-nome').innerText = dados.nome;
            document.getElementById('poke-id').innerText = `ID: #${dados.id}`;
            document.getElementById('poke-imagem').src = dados.imagem;
            document.getElementById('poke-tipo').innerText = dados.tipo;
            document.getElementById('poke-peso').innerText = dados.peso;
            document.getElementById('poke-altura').innerText = dados.altura;
        } else {
            // Se o PHP retornar erro (Pokémon não encontrado)
            cartao.classList.add('escondido');
            erroMsg.innerText = dados.mensagem;
            erroMsg.classList.remove('escondido');
        }
    } catch (erro) {
        console.error('Erro na requisição:', erro);
        alert('Erro ao conectar com o servidor.');
    }
}