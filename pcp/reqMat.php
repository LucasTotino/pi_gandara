<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css"
    crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Requisição de Materiais</title>
</head>
<header>
  <?php
  include_once('../utils/menu.php');
  ?>
</header>

<body>

<div class="row">

      <a href="../pcp/index.php" class="btn">
        <div class="col-2">
          <div style="width: 18rem;">
            <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
          </div>
        </div>
      </a>


      <div class="col-6 m-5 d-flex justify-content-center">
  <h3>Requisição de Materiais</h3>
</div>

    </div>


</div>

  <script>

    const masterCheckBox = document.querySelector('th input');
    masterCheckBox.onchange = (event) =>
      checkBoxes.forEach(e => e.checked = event.target.checked);
  </script>

  <div class="container">
    <table class="table table-striped">
      <tr>
        <th><input type="checkbox" id="allinputs" name="allinputs"></th>
        <th>ID</th>
        <th>Nome</th>
        <th>Idate</th>
      </tr>
      <tr>
        <td><input type="checkbox" id="input1" name="input1"></td>
        <td>1</td>
        <td>João</td>
        <td>23</td>
      </tr>
      <tr>
        <td><input type="checkbox" id="input2" name="input2"></td>
        <td>2</td>
        <td>Maria</td>
        <td>34</td>
      </tr>
      <tr>
        <td><input type="checkbox" id="input3" name="input3"></td>
        <td>3</td>
        <td>José</td>
        <td>45</td>
      </tr>
    </table>
  </div>

  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>