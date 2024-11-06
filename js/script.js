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
};

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
};

function excluirRegistro(registroId, tabela){    
            var confirma = confirm(`Você tem certeza que deseja excluir o Registro [ ${registroId} ] ?`);
    
            if (confirma) {
                $.ajax({
                    url: `/pi_gandara/compras/bd/bd_${tabela}.php`,
                    type: 'POST',
                    data: {
                        acao: "DELETAR",
                        id: registroId
                    },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status === "sucesso") {
                            alert(result.message);
                            location.reload();
                        } else {
                            alert(result.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                        alert("Ocorreu um erro: " + error);
                    }
                });
            }
};

function mascara(mascara, elemento) {
    const valor = elemento.value.replace(/\D/g, ''); // Remove caracteres não numéricos
        let resultado = '';
        let i = 0;

        for (let char of mascara) {
            if (char === '#') {
                if (i < valor.length) {
                    resultado += valor[i];
                    i++;
                } else {
                    break;
                }
            } else {
                resultado += char;
            }
        }

        elemento.value = resultado;
    }
