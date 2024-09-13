<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kanban_db";

// Conectando ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha ao conectar: " . $conn->connect_error);
}

// Adiciona uma nova tarefa
if (isset($_POST['add_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = "INSERT INTO tasks (title, description, status) VALUES ('$title', '$description', 'todo')";
    $conn->query($sql);
}

// Move a tarefa entre colunas
if (isset($_POST['move_task'])) {
    $id = $_POST['task_id'];
    $new_status = $_POST['new_status'];
    $sql = "UPDATE tasks SET status='$new_status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Tarefa movida com sucesso!";
    } else {
        echo "Erro ao mover a tarefa: " . $conn->error;
    }
}

// Apaga uma tarefa
if (isset($_POST['delete_task'])) {
    $id = $_POST['task_id'];
    $sql = "DELETE FROM tasks WHERE id=$id";
    $conn->query($sql);
}

// Seleciona todas as tarefas
$tasks_todo = $conn->query("SELECT * FROM tasks WHERE status='todo'");
$tasks_inprogress = $conn->query("SELECT * FROM tasks WHERE status='inprogress'");
$tasks_done = $conn->query("SELECT * FROM tasks WHERE status='done'");
?>



<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Trabalho Gandara!</title>
</head>
<header>
<nav>
    <a href="/pi_gandara/index.php" title="Home">
      <span class="fa fa-bars" aria-hidden="true"></span>
      <span class="label">Menu</span>
    </a>
    <a href="/pi_gandara/estoque/index.php" title="Estoque">
      <span class="fa fa-solid fa-box"></span>
      <span class="label">Estoque</span>
    </a>
    <a href="/pi_gandara/compras/index.php" title="Compras" class="active">
      <span class="fa fa-money"></span>
      <span class="label">Compras</span>
    </a>
    <a href="/pi_gandara/pcp/index.php" title="PCP">
      <span class="fa fa-helmet-safety"></span>
      <span class="label">PCP</span>
    </a>
    <a href="/pi_gandara/financeiro/index.php" title="Financeiro">
      <span class="fa fa-solid fa-dollar-sign"></span>
      <span class="label">Financeiro</span>
    </a>
    <a href="/pi_gandara/folhaPagamento/index.php" title="Folha de Pagamento">
      <span class="fa fa-file-invoice-dollar"></span>
      <span class="label">Folha de Pagamento</span>
    </a>
    <a href="/pi_gandara/comercial/index.php" title="Comercial">
      <span class="fa fa-chart-line"></span>
      <span class="label">Comercial</span>
    </a>
  </nav>

</header>

<style>
        .kanban-board {
            display: flex;
            justify-content: space-between;
        }
        .kanban-column {
            width: 30%;
            padding: 10px;
        }
        .kanban-task {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>

<body>
  <div class="container">
<h4>Inserir um kanban, que quando checado identifica e passa pra próxima etapa, e marca a etapa anterior como feito</h4>
<h4>realizar o acompanhamento do crescimento da planta (de x em x tempos, realiza o acompanhamento do crecsimento da árvore e do fruto) colocar barra com acompanhamento do crescimneto, sendo 100% a colheita</h4>
</div>


    <div class="container mt-5">
        <h1 class="text-center">Kanban Board</h1>

        <!-- Formulário para adicionar uma nova tarefa -->
        <form action="" method="POST" class="mb-4">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="title" placeholder="Título da Tarefa" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="description" placeholder="Descrição">
                </div>
                <div class="col">
                    <button type="submit" name="add_task" class="btn btn-primary">Adicionar Tarefa</button>
                </div>
            </div>
        </form>

        <!-- Kanban Board -->
        <div class="kanban-board">
            <!-- Coluna To Do -->
            <div class="kanban-column">
                <h3>To Do</h3>
                <?php while ($task = $tasks_todo->fetch_assoc()): ?>
                    <div class="kanban-task">
                        <h5><?php echo $task['title']; ?></h5>
                        <p><?php echo $task['description']; ?></p>
                        <form action="" method="POST" class="d-inline-block">
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <input type="hidden" name="new_status" value="inprogress">
                            <button type="submit" name="move_task" class="btn btn-warning btn-sm">Mover para In Progress</button>
                        </form>
                        <form action="" method="POST" class="d-inline-block">
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <button type="submit" name="delete_task" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Coluna In Progress -->
            <div class="kanban-column">
                <h3>In Progress</h3>
                <?php while ($task = $tasks_inprogress->fetch_assoc()): ?>
                    <div class="kanban-task">
                        <h5><?php echo $task['title']; ?></h5>
                        <p><?php echo $task['description']; ?></p>
                        <form action="" method="POST" class="d-inline-block">
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <input type="hidden" name="new_status" value="done">
                            <button type="submit" name="move_task" class="btn btn-success btn-sm">Mover para Done</button>
                        </form>
                        <form action="" method="POST" class="d-inline-block">
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <button type="submit" name="delete_task" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Coluna Done -->
            <div class="kanban-column">
                <h3>Done</h3>
                <?php while ($task = $tasks_done->fetch_assoc()): ?>
                    <div class="kanban-task">
                        <h5><?php echo $task['title']; ?></h5>
                        <p><?php echo $task['description']; ?></p>
                        <form action="" method="POST" class="d-inline-block">
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <button type="submit" name="delete_task" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>





  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>