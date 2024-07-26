<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/inicio.css">
    <title>Cadastro de Paciente</title>
    <script>
    function buscarPaciente() {
        var query = document.querySelector('.search-box').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'buscarPaci.php?query=' + query, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.querySelector('.result-container').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
    </script>
</head>

<body>
    <header class="header">
        <img class="header__image" src="./assets/images/header.png" alt="">
    </header>
    <main class="principal">
        <a href="" class="principal__volta">Voltar</a>
        <h2 class="search-title">Buscar por Paciente</h2>
        <form class="search-form" onsubmit="event.preventDefault(); buscarPaciente();">
            <div class="search-container">
                <input type="text" name="query" class="search-box" placeholder="Digite para buscar...">
                <input type="submit" value="Buscar" class="search-button">
            </div>
        </form>
        <div class="result-container">
            <?php include 'buscarPaci.php'; ?>
        </div>
        <div class="buttons-container">
            <div>
                <a href="cadastrar_consulta.php"><button class="btn">Cadastrar Consulta</button></a>
                <a href="cadastrar_paciente.php"><button class="btn">Cadastrar Paciente</button></a>
            </div>
            <div>
                <img src="./assets/images/bebe.png" alt="Imagem de um bebê">
            </div>
        </div>
    </main>
    <footer class="footer">
        <img class="footer__img" src="./assets/images/footer.png" alt="">
    </footer>
</body>

</html>
