<?php

require '../utils/conexao.php';

// Verifica de veio ID na URL
$id = isset($_GET['id']) ? $_GET['id'] : false;
$cor = ($id) ? "btn-warning" : "btn-success";

// Caso tenha umm ID, faz a busca do usuário no BD
if ($id) {

  $sql = 'SELECT * FROM cadastro_funcionarios WHERE idFuncionario=?;';
  $stmt = $conn->prepare($sql);
  //troca o ? pelo ID que veio na URL
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $dados = $stmt->get_result();

  // Verifica se encontrou o usuário ou se ele existe no BD
  if ($dados->num_rows > 0) {
    // Coloca os dados do usuário em uma variavel como array
    $user = $dados->fetch_assoc();
  } else {
    // Se não encontrou um usuário, retorna para a página enterior

?>
    <script>
      history.back();
    </script>

<?php
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Cadastro de Funcionários</title>
</head>

<body>
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>


  <main>


    <div class="container">
      <div class="card card-cds">
      <h2 style="text-align:center">
        <?= ($id) ? "Alteração de Funcionário" : "Cadastro de Funcionário"  ?>
      </h2>
      <form class="mt-3 mb-3 ml-3 mr-3"action="/pi_gandara/folhaPagamento/bd-funcionarios.php" method="POST">
        <input type="hidden" id="idFuncionario" name="idFuncionario"
          value="<?= isset($_GET['id']) ? ($_GET['id']) : null ?>">
        <input type="hidden" id="acao" name="acao" value="<?= isset($_GET['id']) ? " ALTERAR" : "INCLUIR" ?>">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fpNome">Nome:</label>
            <input type="text" id="fpNome" class="form-control" name="fpNome" required placeholder="Nome comleto do colaborador" 
              value="<?= ($id) ? $user['fpNome'] : null ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="fpRg">RG:</label>
            <input type="text" class="form-control" id="fpRg" name="fpRg" required placeholder="Apenas numeros do RG"
              value="<?= ($id) ? $user['fpRg'] : null ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="fpCpf">CPF:</label>
            <input type="text" class="form-control" id="fpCpf" name="fpCpf" required placeholder="Apenas numeros do CPF"
              value="<?= ($id) ? $user['fpCpf'] : null ?>">
          </div>
          <div class="form-group col-md-10">
            <label for="fpEndereco">Endereço:</label>
            <input type="text" class="form-control" id="fpEndereco" name="fpEndereco" required placeholder="Nome da rua"
              value="<?= ($id) ? $user['fpEndereco'] : null ?>">
          </div>
          <div class="form-group col-md-2">
            <label for="fpNumeroCasa">N°:</label>
            <input type="text" class="form-control" id="fpNumeroCasa" name="fpNumeroCasa" required placeholder="N° casa"
              value="<?= ($id) ? $user['fpNumeroCasa'] : null ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="fpEstado">Estado:</label>
            <select type="text" id="fpEstado" name="fpEstado" class="form-control"
              value="<?= ($id) ? $user['fpEstado'] : null ?>">
              <option required value="">Selecione..</option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "AC") ? "selected" : null ?> value="AC">Acre
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "AL") ? "selected" : null ?> value="AL">Alagoas
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "AP") ? "selected" : null ?> value="AP">Amapá
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "AM") ? "selected" : null ?> value="AM">Amazonas
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "BA") ? "selected" : null ?> value="BA">Bahia
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "CE") ? "selected" : null ?> value="CE">Ceará
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "DF") ? "selected" : null ?> value="DF">Distrito
                Federal</option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "ES") ? "selected" : null ?> value="ES">Espírito
                Santo</option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "GO") ? "selected" : null ?> value="GO">Goiás
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "MA") ? "selected" : null ?> value="MA">Maranhão
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "MT") ? "selected" : null ?> value="MT">Mato
                Grosso
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "MS") ? "selected" : null ?> value="MS">Mato
                Grosso
                do Sul</option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "MG") ? "selected" : null ?> value="MG">Minas
                Gerais
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "PA") ? "selected" : null ?> value="PA">Pará
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "PB") ? "selected" : null ?> value="PB">Paraíba
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "PR") ? "selected" : null ?> value="PR">Paraná
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "PE") ? "selected" : null ?> value="PE">Pernambuco
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "PI") ? "selected" : null ?> value="PI">Piauí
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "RJ") ? "selected" : null ?> value="RJ">Rio de
                Janeiro</option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "RN") ? "selected" : null ?> value="RN">Rio Grande
                do Norte</option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "RS") ? "selected" : null ?> value="RS">Rio Grande
                do Sul</option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "RO") ? "selected" : null ?> value="RO">Rondônia
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "RR") ? "selected" : null ?> value="RR">Roraima
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "SC") ? "selected" : null ?> value="SC">Santa
                Catarina</option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "SP") ? "selected" : null ?> value="SP">São Paulo
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "SE") ? "selected" : null ?> value="SE">Sergipe
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstado'] == "TO") ? "selected" : null ?> value="TO">Tocantins
              </option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="fpCidade">Cidade:</label>
            <input type="text" class="form-control" name="fpCidade" id="fpCidade" required placeholder="cidade"
              value="<?= ($id) ? $user['fpCidade'] : null ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="fpCep">CEP:</label>
            <input type="text" class="form-control" name="fpCep" id="fpCep" required placeholder="cep"
              value="<?= ($id) ? $user['fpCep'] : null ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="fpEtnia">Etnia:</label>
            <select type="text" id="fpEtnia" name="fpEtnia" class="form-control"
              value="<?= ($id) ? $user['fpEtnia'] : null ?>">
              <option required value="">Selecione..</option>
              <option <?= isset($_GET['id']) && ($user['fpEtnia'] == "0") ? "selected" : null ?>>Branco
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEtnia'] == "1") ? "selected" : null ?>>Amarelo
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEtnia'] == "2") ? "selected" : null ?>>Pardo
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEtnia'] == "3") ? "selected" : null ?>>Negro
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEtnia'] == "4") ? "selected" : null ?>>Indígena
              </option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="fpGenero">Gênero:</label>
            <select type="text" id="fpGenero" name="fpGenero" required class="form-control"
              value="<?= ($id) ? $user['fpGenero'] : null ?>">
              <option required value="">Selecione..</option>
              <option <?= isset($_GET['id']) && ($user['fpGenero'] == "0") ? "selected" : null ?>>Masculino
              </option>
              <option <?= isset($_GET['id']) && ($user['fpGenero'] == "1") ? "selected" : null ?>>Feminino
              </option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="fpDataNascimento">Data de Nascimento:</label>
            <input type="date" class="form-control" id="fpDataNascimento" name="fpDataNascimento" required
              placeholder="data de nascimento" value="<?= ($id) ? $user['fpDataNascimento'] : null ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="fpEmail">E-mail:</label>
            <input type="text" class="form-control" name="fpEmail" required id="fpEmail" placeholder="e-mail"
              value="<?= ($id) ? $user['fpEmail'] : null ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="fpTelefone">Telefone Fixo:</label>
            <input type="tel" class="form-control" id="fpTelefone" name="fpTelefone" placeholder="(14)-9999-9999"
              value="<?= ($id) ? $user['fpTelefone'] : null ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="fpCelular">Celular:</label>
            <input type="tel" class="form-control" id="fpCelular" name="fpCelular" required placeholder="(14)-99999-9999"
              value="<?= ($id) ? $user['fpCelular'] : null ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="fpDependentes">Dependentes:</label>
            <input type="text" class="form-control" id="fpDependentes" name="fpDependentes" required placeholder="Dependentes"
              value="<?= ($id) ? $user['fpDependentes'] : null ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="fpIdadeDependentes">Idade Dependentes:</label>
            <input type="text" class="form-control" id="fpIdadeDependentes" name="fpIdadeDependentes"
              placeholder="idade dependentes" value="<?= ($id) ? $user['fpIdadeDependentes'] : null ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="fpEstadoCivil">Estado Civil:</label>
            <select type="text" id="fpEstadoCivil" name="fpEstadoCivil" required class="form-control"
              value="<?= ($id) ? $user['fpEstadoCivil'] : null ?>">
              <option required value="">Selecione..</option>
              <option <?= isset($_GET['id']) && ($user['fpEstadoCivil'] == "0") ? "selected" : null ?>
                value="Solteiro">Solteiro
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstadoCivil'] == "1") ? "selected" : null ?> value="Casado">Casado
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstadoCivil'] == "2") ? "selected" : null ?> value="Uniao
                Estavel">União Estável</option>
              <option <?= isset($_GET['id']) && ($user['fpEstadoCivil'] == "3") ? "selected" : null ?>
                value="Amasiado">Amasiado
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstadoCivil'] == "4") ? "selected" : null ?>
                value="Separado">Separado
              </option>
              <option <?= isset($_GET['id']) && ($user['fpEstadoCivil'] == "5") ? "selected" : null ?>
                value="Divorciado">Divorciado
              </option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="fpCargo">Cargo:</label>
            <select type="text" id="fpCargo" name="fpCargo" required class="form-control"
              value="<?= ($id) ? $user['fpCargo'] : null ?>">
              <option required value="">Selecione..</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "0") ? "selected" : null ?> value="Auxiliar de
                lavoura">Auxiliar de
                lavoura</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "1") ? "selected" : null ?> value="Técnico de
                lavoura">Técnico de
                lavoura</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "2") ? "selected" : null ?> value="Gerente de
                lavoura">Gerente de
                lavoura</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "3") ? "selected" : null ?> value="Auxiliar
                comercial">Auxiliar
                comercial</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "4") ? "selected" : null ?> value="Técnico
                comercial">Técnico
                comercial
              </option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "5") ? "selected" : null ?> value="Gerente
                comercial">Gerente
                comercial
              </option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "6") ? "selected" : null ?> value="Auxiliar de
                compras">Auxiliar de
                compras</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "7") ? "selected" : null ?> value="Técnico de
                compras">Técnico de
                compras</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "8") ? "selected" : null ?> value="Gerente de
                compras">Gerente de
                compras</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "9") ? "selected" : null ?> value="Auxiliar de
                estoque">Auxiliar de
                estoque</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "10") ? "selected" : null ?> value="Técnico de
                estoque">Técnico de
                estoque</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "11") ? "selected" : null ?> value="Gerente de
                estoque">Gerente de
                estoque</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "12") ? "selected" : null ?> value="Auxiliar
                financeiro">Auxiliar
                financeiro</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "13") ? "selected" : null ?> value="Técnico
                financeiro">Técnico
                financeiro</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "14") ? "selected" : null ?> value="Gerente
                financeiro">Gerente
                financeiro</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "15") ? "selected" : null ?> value="Auxiliar de
                Recursos Humanos">Auxiliar de
                Recursos Humanos</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "16") ? "selected" : null ?> value="Técnico de
                Recursos Humanos">Técnico de
                Recursos Humanos</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "17") ? "selected" : null ?> value="Gerente de
                Recursos Humanos">Gerente de
                Recursos Humanos</option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "18") ? "selected" : null ?> value="Auxiliar
                geral">Auxiliar
                geral
              </option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "19") ? "selected" : null ?> value="Limpeza">Limpeza
              </option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "20") ? "selected" : null ?> value="Motorista">Motorista
              </option>
              <option <?= isset($_GET['id']) && ($user['fpCargo'] == "21") ? "selected" : null ?> value="Diretor">Diretor
              </option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="fpSetor">Setor:</label>
            <select type="text" id="fpSetor" name="fpSetor" required class="form-control"
              value="<?= ($id) ? $user['fpSetor'] : null ?>">
              <option required value="">Selecione..</option>
              <option <?= isset($_GET['id']) && ($user['fpSetor'] == "0") ? "selected" : null ?> value="Lavoura">Lavoura
              </option>
              <option <?= isset($_GET['id']) && ($user['fpSetor'] == "1") ? "selected" : null ?> value="Comercial">Comercial
              </option>
              <option <?= isset($_GET['id']) && ($user['fpSetor'] == "2") ? "selected" : null ?> value="Compras">Compras
              </option>
              <option <?= isset($_GET['id']) && ($user['fpSetor'] == "3") ? "selected" : null ?> value="Estoque">Estoque
              </option>
              <option <?= isset($_GET['id']) && ($user['fpSetor'] == "4") ? "selected" : null ?> value="Financeiro">Financeiro
              </option>
              <option <?= isset($_GET['id']) && ($user['fpSetor'] == "5") ? "selected" : null ?> value="Recursos
                Humanos">Recursos
                Humanos
              </option>
              <option <?= isset($_GET['id']) && ($user['fpSetor'] == "6") ? "selected" : null ?> value="Frota">Frota</option>
              <option <?= isset($_GET['id']) && ($user['fpSetor'] == "7") ? "selected" : null ?> value="Limpeza">Limpeza
              </option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="fpDataAdimissao">Data de Admissão:</label>
            <input type="date" class="form-control" id="fpDataAdimissao" name="fpDataAdimissao" required
              placeholder="data de admissão" value="<?= ($id) ? $user['fpDataAdimissao'] : null ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="fpDataDemissao">Data de Demissão:</label>
            <input type="date" class="form-control" id="fpDataDemissao" name="fpDataDemissao"
              placeholder="data de demissão" value="<?= ($id) ? $user['fpDataDemissao'] : null ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="fpSalarioBruto">Salário bruto:</label>
            <input type="number" step="0.01" min="0.01" class="form-control" name="fpSalarioBruto" id="fpSalarioBruto" required
              placeholder="R$ 1.000,00" value="<?= ($id) ? $user['fpSalarioBruto'] : null ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="fpMetodoPagamento">Método de pagamento:</label>
            <select type="text" id="fpMetodoPagamento" name="fpMetodoPagamento" class="form-control"
              value="<?= ($id) ? $user['fpMetodoPagamento'] : null ?>">
              <option selected hidden>Escolha...</option>
              <option value="0">Selecione..</option>
              <option <?= isset($_GET['id']) && ($user['fpMetodoPagamento'] == "Dinheiro") ? "selected" : null ?>
                value="1">Dinheiro</option>
              <option <?= isset($_GET['id']) && ($user['fpMetodoPagamento'] == "Pix") ? "selected" : null ?>
                value="2">Pix
              </option>
              <option <?= isset($_GET['id']) && ($user['fpMetodoPagamento'] == "Cheque") ? "selected" : null ?>
                value="3">Depósito</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="fpChavePix">Chave Pix:</label>
            <input type="text" class="form-control" name="fpChavePix" id="fpChavePix" placeholder="chave pix"
              value="<?= ($id) ? $user['fpChavePix'] : null ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="fpAgenciaConta">Agência e Conta:</label>
            <input type="text" class="form-control" name="fpAgenciaConta" id="fpAgenciaConta"
              placeholder="agencia/conta" value="<?= ($id) ? $user['fpAgenciaConta'] : null ?>">
          </div>
          <div class="form-group col-md-12">
            <label for="fpObservacoes">Observações:</label>
            <textarea class="form-control" id="fpObservacoes" rows="5"></textarea>
          </div>
          <div class="form-row justify-content-center">
            <div class="mr-3">
              <button type="submit" name="submit" class="btn btn-success">Cadastrar</button>
            </div>
            <div class="mr-3">
              <button type="reset" class="btn btn-warning">Cancelar</button>
            </div>
            <div class="mr-3">
              <a href="/pi_gandara/folhaPagamento/index.php"><button type="button" class="btn btn-danger">Voltar</button></a>
            </div>
          </div>
      </form>
      </div>
  </main>
  
  <script src="../js/script.js"></script>
  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <scrip src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    
  </body>


</html>