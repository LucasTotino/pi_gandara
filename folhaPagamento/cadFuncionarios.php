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

  // Como converter data do JP para PT-BR
  // <?= date("d/m/Y", strtotime("datanascimento"))

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Funcionários</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


  <!-- Admin Lte-->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Admin Lte-->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="CSS/style.css">

</head>

<body>

  <main>

    <main>
      <div class="container mt-5">
        <h2 style="text-align:center">
          <?= ($id) ? "Alteração de Funcionário" : "Cadastro de Funcionário"  ?>
        </h2>
        <form action="/pi_gandara/folhaPagamento/bd-funcionarios.php" method="POST">
          <input type="hidden" id="idFuncionario" name="idFuncionario"
            value="<?= isset($_GET['id']) ? ($_GET['id']) : null?>">
          <input type="hidden" id="acao" name="acao" value="<?= isset($_GET['id']) ? " ALTERAR" : "INCLUIR" ?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="fpNome">Nome:</label>
              <input type="text" id="fpNome" class="form-control" name="fpNome" placeholder="nome"
                value="<?= ($id) ? $user['fpNome'] : null ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="fpRg">RG:</label>
              <input type="text" class="form-control" id="fpRg" name="fpRg" placeholder="rg"
                value="<?= ($id) ? $user['fpRg'] : null ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="fpCpf">CPF:</label>
              <input type="text" class="form-control" id="fpCpf" name="fpCpf" placeholder="cpf"
                value="<?= ($id) ? $user['fpCpf'] : null ?>">
            </div>
            <div class="form-group col-md-10">
              <label for="fpEndereco">Endereço:</label>
              <input type="text" class="form-control" id="fpEndereco" name="fpEndereco" placeholder="endereço"
                value="<?= ($id) ? $user['fpEndereco'] : null ?>">
            </div>
            <div class="form-group col-md-2">
              <label for="fpNumeroCasa">N°:</label>
              <input type="text" class="form-control" id="fpNumeroCasa" name="fpNumeroCasa" placeholder="n° casa"
                value="<?= ($id) ? $user['fpNumeroCasa'] : null ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="fpEstado">Estado:</label>
              <select type="text" id="fpEstado" name="fpEstado" class="form-control"
                value="<?= ($id) ? $user['fpEstado'] : null ?>">
                <option selected hidden>Escolha...</option>
                <option value="">Selecione..</option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="AC" ) ? "selected" : null ?> value="AC">Acre
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="AL" ) ? "selected" : null ?> value="AL">Alagoas
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="AP" ) ? "selected" : null ?> value="AP">Amapá
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="AM" ) ? "selected" : null ?> value="AM">Amazonas
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="BA" ) ? "selected" : null ?> value="BA">Bahia
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="CE" ) ? "selected" : null ?> value="CE">Ceará
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="DF" ) ? "selected" : null ?> value="DF">Distrito
                  Federal</option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="ES" ) ? "selected" : null ?> value="ES">Espírito
                  Santo</option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="GO" ) ? "selected" : null ?> value="GO">Goiás
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="MA" ) ? "selected" : null ?> value="MA">Maranhão
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="MT" ) ? "selected" : null ?> value="MT">Mato
                  Grosso
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="MS" ) ? "selected" : null ?> value="MS">Mato
                  Grosso
                  do Sul</option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="MG" ) ? "selected" : null ?> value="MG">Minas
                  Gerais
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="PA" ) ? "selected" : null ?> value="PA">Pará
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="PB" ) ? "selected" : null ?> value="PB">Paraíba
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="PR" ) ? "selected" : null ?> value="PR">Paraná
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="PE" ) ? "selected" : null ?> value="PE">Pernambuco
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="PI" ) ? "selected" : null ?> value="PI">Piauí
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="RJ" ) ? "selected" : null ?> value="RJ">Rio de
                  Janeiro</option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="RN" ) ? "selected" : null ?> value="RN">Rio Grande
                  do Norte</option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="RS" ) ? "selected" : null ?> value="RS">Rio Grande
                  do Sul</option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="RO" ) ? "selected" : null ?> value="RO">Rondônia
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="RR" ) ? "selected" : null ?> value="RR">Roraima
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="SC" ) ? "selected" : null ?> value="SC">Santa
                  Catarina</option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="SP" ) ? "selected" : null ?> value="SP">São Paulo
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="SE" ) ? "selected" : null ?> value="SE">Sergipe
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstado']=="TO" ) ? "selected" : null ?> value="TO">Tocantins
                </option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="fpCidade">Cidade:</label>
              <input type="text" class="form-control" name="fpCidade" id="fpCidade" placeholder="cidade"
                value="<?= ($id) ? $user['fpCidade'] : null ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="fpCep">CEP:</label>
              <input type="text" class="form-control" name="fpCep" id="fpCep" placeholder="cep"
                value="<?= ($id) ? $user['fpCep'] : null ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="fpEtnia">Etnia:</label>
              <select type="text" id="fpEtnia" name="fpEtnia" class="form-control"
                value="<?= ($id) ? $user['fpEtnia'] : null ?>">
                <option selected hidden>Escolha...</option>
                <option value="">Selecione..</option>
                <option <?=isset($_GET['id']) && ($user['fpEtnia']=="0" ) ? "selected" : null ?> >Branco
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEtnia']=="1" ) ? "selected" : null ?> >Amarelo
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEtnia']=="2" ) ? "selected" : null ?> >Pardo
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEtnia']=="3" ) ? "selected" : null ?> >Negro
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEtnia']=="4" ) ? "selected" : null ?> >Indígena
                </option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="fpGenero">Gênero:</label>
              <select type="text" id="fpGenero" name="fpGenero" class="form-control"
                value="<?= ($id) ? $user['fpGenero'] : null ?>">
                <option selected hidden>Escolha...</option>
                <option value="">Selecione..</option>
                <option <?=isset($_GET['id']) && ($user['fpGenero']=="0" ) ? "selected" : null ?> >Masculino
                </option>
                <option <?=isset($_GET['id']) && ($user['fpGenero']=="1" ) ? "selected" : null ?> >Feminino
                </option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="fpDataNascimento">Data de Nascimento:</label>
              <input type="date" class="form-control" id="fpDataNascimento" name="fpDataNascimento"
                placeholder="data de nascimento" value="<?= ($id) ? $user['fpDataNascimento'] : null ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="fpEmail">E-mail:</label>
              <input type="text" class="form-control" name="fpEmail" id="fpEmail" placeholder="e-mail"
                value="<?= ($id) ? $user['fpEmail'] : null ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="fpTelefone">Telefone Fixo:</label>
              <input type="tel" class="form-control" id="fpTelefone" name="fpTelefone" placeholder="(14)-9999-9999"
                value="<?= ($id) ? $user['fpTelefone'] : null ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="fpCelular">Celular:</label>
              <input type="tel" class="form-control" id="fpCelular" name="fpCelular" placeholder="(14)-99999-9999"
                value="<?= ($id) ? $user['fpCelular'] : null ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="fpDependentes">Dependentes:</label>
              <input type="text" class="form-control" id="fpDependentes" name="fpDependentes" placeholder="dependentes"
                value="<?= ($id) ? $user['fpDependentes'] : null ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="fpIdadeDependentes">Idade Dependentes:</label>
              <input type="text" class="form-control" id="fpIdadeDependentes" name="fpIdadeDependentes"
                placeholder="idade dependentes" value="<?= ($id) ? $user['fpIdadeDependentes'] : null ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="fpEstadoCivil">Estado Civil:</label>
              <select type="text" id="fpEstadoCivil" name="fpEstadoCivil" class="form-control"
                value="<?= ($id) ? $user['fpEstadoCivil'] : null ?>">
                <option selected hidden>Escolha...</option>
                <option value="">Selecione..</option>
                <option <?=isset($_GET['id']) && ($user['fpEstadoCivil']=="0" ) ? "selected" : null ?>
                  value="0">Solteiro
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstadoCivil']=="1" ) ? "selected" : null ?> value="1">Casado
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstadoCivil']=="2" ) ? "selected" : null ?> value="2">União
                  Estável</option>
                <option <?=isset($_GET['id']) && ($user['fpEstadoCivil']=="3" ) ? "selected" : null ?>
                  value="3">Amasiado
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstadoCivil']=="4" ) ? "selected" : null ?>
                  value="4">Separado
                </option>
                <option <?=isset($_GET['id']) && ($user['fpEstadoCivil']=="5" ) ? "selected" : null ?>
                  value="5">Divorciado
                </option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="fpCargo">Cargo:</label>
              <select type="text" id="fpCargo" name="fpCargo" class="form-control"
                value="<?= ($id) ? $user['fpCargo'] : null ?>">
                <option selected hidden>Escolha...</option>
                <option value="">Selecione..</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="0" ) ? "selected" : null ?> value="0">Auxiliar de
                  lavoura</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="1" ) ? "selected" : null ?> value="1">Técnico de
                  lavoura</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="2" ) ? "selected" : null ?> value="2">Gerente de
                  lavoura</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="3" ) ? "selected" : null ?> value="3">Auxiliar
                  comercial</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="4" ) ? "selected" : null ?> value="4">Técnico
                  comercial
                </option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="5" ) ? "selected" : null ?> value="5">Gerente
                  comercial
                </option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="6" ) ? "selected" : null ?> value="6">Auxiliar de
                  compras</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="7" ) ? "selected" : null ?> value="7">Técnico de
                  compras</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="8" ) ? "selected" : null ?> value="8">Gerente de
                  compras</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="9" ) ? "selected" : null ?> value="9">Auxiliar de
                  estoque</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="10" ) ? "selected" : null ?> value="10">Técnico de
                  estoque</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="11" ) ? "selected" : null ?> value="11">Gerente de
                  estoque</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="12" ) ? "selected" : null ?> value="12">Auxiliar
                  financeiro</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="13" ) ? "selected" : null ?> value="13">Técnico
                  financeiro</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="14" ) ? "selected" : null ?> value="14">Gerente
                  financeiro</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="15" ) ? "selected" : null ?> value="15">Auxiliar de
                  Recursos Humanos</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="16" ) ? "selected" : null ?> value="16">Técnico de
                  Recursos Humanos</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="17" ) ? "selected" : null ?> value="17">Gerente de
                  Recursos Humanos</option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="18" ) ? "selected" : null ?> value="18">Auxiliar
                  geral
                </option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="19" ) ? "selected" : null ?> value="19">Limpeza
                </option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="20" ) ? "selected" : null ?> value="20">Motorista
                </option>
                <option <?=isset($_GET['id']) && ($user['fpCargo']=="21" ) ? "selected" : null ?> value="21">Diretor
                </option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="fpSetor">Setor:</label>
              <select type="text" id="fpSetor" name="fpSetor" class="form-control"
                value="<?= ($id) ? $user['fpSetor'] : null ?>">
                <option selected hidden>Escolha...</option>
                <option value="">Selecione..</option>
                <option <?=isset($_GET['id']) && ($user['fpSetor']=="0" ) ? "selected" : null ?> value="0">Lavoura
                </option>
                <option <?=isset($_GET['id']) && ($user['fpSetor']=="1" ) ? "selected" : null ?> value="1">Comercial
                </option>
                <option <?=isset($_GET['id']) && ($user['fpSetor']=="2" ) ? "selected" : null ?> value="2">Compras
                </option>
                <option <?=isset($_GET['id']) && ($user['fpSetor']=="3" ) ? "selected" : null ?> value="3">Estoque
                </option>
                <option <?=isset($_GET['id']) && ($user['fpSetor']=="4" ) ? "selected" : null ?> value="4">Financeiro
                </option>
                <option <?=isset($_GET['id']) && ($user['fpSetor']=="5" ) ? "selected" : null ?> value="5">Recursos
                  Humanos
                </option>
                <option <?=isset($_GET['id']) && ($user['fpSetor']=="6" ) ? "selected" : null ?> value="6">Frota</option>
                <option <?=isset($_GET['id']) && ($user['fpSetor']=="7" ) ? "selected" : null ?> value="7">Limpeza
                </option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="fpDataAdimissao">Data de Admissão:</label>
              <input type="date" class="form-control" id="fpDataAdimissao" name="fpDataAdimissao"
                placeholder="data de admissão" value="<?= ($id) ? $user['fpDataAdimissao'] : null ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="fpDataDemissao">Data de Demissão:</label>
              <input type="date" class="form-control" id="fpDataDemissao" name="fpDataDemissao"
                placeholder="data de demissão" value="<?= ($id) ? $user['fpDataDemissao'] : null ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="fpSalarioBruto">Salário bruto:</label>
              <input type="text" class="form-control" name="fpSalarioBruto" id="fpSalarioBruto"
                placeholder="salário bruto" value="<?= ($id) ? $user['fpSalarioBruto'] : null ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="fpMetodoPagamento">Método de pagamento:</label>
              <select type="text" id="fpMetodoPagamento" name="fpMetodoPagamento" class="form-control"
                value="<?= ($id) ? $user['fpMetodoPagamento'] : null ?>">
                <option selected hidden>Escolha...</option>
                <option value="0">Selecione..</option>
                <option <?=isset($_GET['id']) && ($user['fpMetodoPagamento']=="Dinheiro" ) ? "selected" : null ?>
                  value="1">Dinheiro</option>
                <option <?=isset($_GET['id']) && ($user['fpMetodoPagamento']=="Pix" ) ? "selected" : null ?>
                  value="2">Pix
                </option>
                <option <?=isset($_GET['id']) && ($user['fpMetodoPagamento']=="Cheque" ) ? "selected" : null ?>
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
            <br>
            <div class="container">
              <div class="container text-center align-content-center">
                <button type="submit" class="btn <?= $cor ?> align-content-center">Enviar</button>
                <a href="/pi_gandara/folhaPagamento/index.php"><button type="button"
                    class="btn btn-warning">Voltar</button></a>
              </div>
            </div>


        </form>
      </div>

      <script src="/plugins/jquery/jquery.min.js"></script>
      <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="/dist/js/adminlte.min.js"></script>
</body>

</html>