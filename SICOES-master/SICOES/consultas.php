<?php

include_once("./conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select * from produto where nome like '%$filtro%'";
$consulta = mysqli_query($con,$sql);
$registros = mysqli_num_rows($consulta);

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/consultas.css">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="./CSS/slick.css" />
    <title>Consultas - SICOES</title>
</head>

<body>
    <header class="menu-inicio">
        <main>
            <div class="header-1">
                <div class="logo">
                    <img src="./img/img5.png" />
                </div>
            </div>
        </main>
    </header>

    <div class="card">
        <h2 class="title">Serviços</h2>
        <nav>
            <ul class="menu">
                <a href="./servicos.html">
                <li>Cadastro</li>
                </a>
                <a href="./consultas.php">
                    <li>Consulta</li>
                </a>
            </ul>
        </nav>
        <section>
            <h1>Consulta de produtos</h1>
            <hr><br><br>
            <form method="GET" action="">
                Filtrar por nome: <input type="text" name="filtro" class="campo" required autofocus>
                <input type="submit" value="Pesquisar" class="btn">
            </form>
            <?php

            while($exibirRegistros = mysqli_fetch_array($consulta)){

                $idProduto = $exibirRegistros[0];
                $nome = $exibirRegistros[1];
                $data = $exibirRegistros[2];
                $quantidade = $exibirRegistros[3];
                echo "<article>";
                echo "ID: $idProduto<br>";
                echo "Produto: $nome<br>";
                echo "Data: $data<br>";
                echo "Quantidade: $quantidade";
                echo "</article>";
            }
            ?>
        </section>
    </div>
</body>

</html>