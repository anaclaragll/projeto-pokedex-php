# ⚡ Pokédex API - Atividade Prática

Este projeto foi desenvolvido para a disciplina de **Programação para Internet I** do curso de Tecnologia em Análise e Desenvolvimento de Sistemas.

## 🎯 Objetivo
Desenvolver uma aplicação funcional que consome a **PokeAPI**, utilizando PHP no back-end como ponte (proxy) e JavaScript no front-end para manipulação assíncrona dos dados.

## 🚀 Tecnologias Utilizadas
* **HTML5**: Estruturação da página.
* **CSS3**: Estilização personalizada e responsividade (sem frameworks).
* **JavaScript (ES6+)**: Consumo assíncrono via `fetch`.
* **PHP 8.2**: Consumo da API externa via `file_get_contents` e tratamento de JSON.

## 🛠️ Funcionalidades
- [x] Busca de Pokémon por nome ou ID.
- [x] Exibição de imagem oficial de alta qualidade.
- [x] Exibição de atributos (Tipo, Peso e Altura).
- [x] Tratamento de erros para buscas inválidas.
- [x] Layout responsivo para dispositivos móveis.

## 📂 Estrutura de Arquivos
- `index.html`: Página principal.
- `style.css`: Estilização e media queries.
- `api.php`: Lógica de back-end para consumo da PokeAPI.
- `script.js`: Lógica de front-end para requisições e atualização do DOM.