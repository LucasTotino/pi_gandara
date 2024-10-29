const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Função para buscar e preencher a descrição do produto
function carregarDescricao(produtoId) {
    if (produtoId) {
        fetch('../compras/utils/descricao.php?id=' + produtoId)
            .then(response => response.text())
            .then(data => {
                document.getElementById('descricao').value = data;
            })
            .catch(error => console.error('Erro:', error));
    } else {
        document.getElementById('descricao').value = '';
    }
}

function carregaProduto(solCompraId) {
    if (solCompraId) {
        fetch('utils/produto.php?id=' + solCompraId)
            .then(response => response.json()) // Espera JSON da API
            .then(data => {
                if (!data.error) {
                    document.getElementById('observacao').value = data.observacao || '';
                    document.getElementById('descricao').value = data.descricao || '';
                    document.getElementById('id_produto').value = data.produto || '';
                } else {
                    console.error(data.error);
                    alert('Nenhum dado encontrado.');
                }
            })
            .catch(error => console.error('Erro:', error));
    } else {
        document.getElementById('observacao').value = '';
        document.getElementById('descricao').value = '';
        document.getElementById('id_produto').value = '';
    }
}

