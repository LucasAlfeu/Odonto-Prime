

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/cadastroPaciente.css">
    <title>Cadstro de Paciente</title>
</head>
<body>
    <header class="header">
        <img class="header__image" src="./assets/images/header.png" alt="">
    </header>

    <main class="principal">
        <a href="" class="princial__volta">Voltar</a>
        <h1 class="principal__title">Cadastro Paciente</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" class="principal__formulario">
            <h2 class="formulario__titulo">Responsável</h2>
            <div class="form__box">
                Nome: <input type="text" class="form__input" name="nome_resp">
                Email: <input type="text" class="form__input" name="email_resp">
                Telefone: <input type="text" class="form__input" name="tel_resp">
            </div>

            <h2 class="formulario__titulo">Criança</h2>
            <div class="form__box">
                Nome: <input type="text" class="form__input" name="nome_paci">
                Data Nascimento: <input type="text" class="form__input" name="nasci_paci">
            </div>
            <br>
            <h2 class="formulario__titulo">Avatar</h2>
            <section class="form__avatar">
                <div class="form__avatar--corpo">
                    <img src="./assets/images/cabelo/1.png" alt="" class="cabelo" id="cabelo_image">
                    <img src="./assets/images/rosto/1.png" alt="" class="rosto" id="rosto_image">
                    <img src="./assets/images/pele/1.png" alt="" class="pele" id="pele_image">
                    <img src="./assets/images/torso/1.png" alt="" class="tronco" id="tronco_image">
                    <img src="./assets/images/pernas/1.png" alt="" class="pernas" id="pernas_image">
                </div>
                <div class="form__avatar--controlers">
                    <div class="avatar__box">
                        Cabelo: 
                        <input type="button" value="←" class="btn" onclick="diminuirCabelo(document.getElementById('cabelo_lego'), document.getElementById('cabelo_image'))">
                        <input class="avatar__input" type="text" name="ipt_cabelo" id="cabelo_lego" value="1">
                        <input type="button" value="→" class="btn" onclick="aumentarCabelo(document.getElementById('cabelo_lego'), document.getElementById('cabelo_image'))"">
                    </div>
                    <div class="avatar__box">
                        Rosto: 
                        <input type="button" value="←" class="btn" onclick="diminuirRosto(document.getElementById('rosto_lego'), document.getElementById('rosto_image'))">
                        <input class="avatar__input" type="text" name="" id="rosto_lego" value="1">
                        <input type="button" value="→" class="btn" onclick="aumentarRosto(document.getElementById('rosto_lego'), document.getElementById('rosto_image'))">
                    </div>
                    <div class="avatar__box">
                        Pele: 
                        <input type="button" value="←" class="btn" onclick="diminuirPele(document.getElementById('pele_lego'), document.getElementById('pele_image'))">
                        <input class="avatar__input" type="text" name="" id="pele_lego" value="1">
                        <input type="button" value="→" class="btn" onclick="aumentarPele(document.getElementById('pele_lego'), document.getElementById('pele_image'))">
                    </div>
                    <div class="avatar__box">
                        Tronco: 
                        <input type="button" value="←" class="btn" onclick="diminuirTorso(document.getElementById('tronco_lego'), document.getElementById('tronco_image'))">
                        <input class="avatar__input" type="text" name="" id="tronco_lego" value="1">
                        <input type="button" value="→" class="btn" onclick="aumentarTorso(document.getElementById('tronco_lego'), document.getElementById('tronco_image'))">
                    </div>
                    <div class="avatar__box">
                        Pernas: 
                        <input type="button" value="←" class="btn" onclick="diminuirPerna(document.getElementById('pernas_lego'), document.getElementById('pernas_image'))">
                        <input class="avatar__input" type="text" name="" id="pernas_lego" value="1">
                        <input type="button" value="→" class="btn" onclick="aumentarPerna(document.getElementById('pernas_lego'), document.getElementById('pernas_image'))">
                    </div>
                </div>
            </section>
            <input type="submit" value="Cadastrar" class="form__btnCadastrar" onclick="mostraPaths()">
        </form>
    </main>
    <footer class="footer">
        <img class="footer__img" src="./assets/images/footer.png" alt="">
    </footer>
    <script src="./assets/scripts/javascript/moldaAvatar.js"></script>

<?php 
   $nomeResp = $emailResp = $telResp = "";
   $nomePaci = $nasciPaci = "";
   $cabelo = $rosto = $pele = $torso = $pernas = "";

   function teste_entrada($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["nome_resp"])){
            $nomeResp = "Nome do Responsável Obrigatório";
        } else {
            $nomeResp = teste_entrada($_POST["nome_resp"]);
            if(!preg_match("/^[a-zA-Z]*$/", $nomeResp)){
                $nomeResp = "Apenas letras e espaços em branco são permitidos";
            }
        }

        if(empty($_POST["email_resp"])){
            $emailResp = "Email do Responsável Obrigatório";
        } else {
            $emailResp = teste_entrada($_POST["email_resp"]);
            if(!filter_var($emailResp, FILTER_VALIDATE_EMAIL)){
                $emailResp = "Email do responsável no formato errado";
            }
        }

        if(empty($_POST["tel_resp"])){
            $telResp = "Telefone do Responsável Obrigatório";
        } else {
            $telResp = teste_entrada($_POST["tel_resp"]);
            if(!preg_match("/^[0-9]*$/", $telResp)){
                $telResp = "Apenas números e espaços em branco são permitidos";
            }
        }

        if(empty($_POST["nome_paci"])){
            $nomePaci = "Nome do Paciente Obrigatório";
        } else {
            $nomePaci = teste_entrada($_POST["nome_paci"]);
            if(!preg_match("/^[a-zA-Z]*$/", $nomePaci)){
                $nomePaci = "Apenas letras e espaços em branco são permitidos";
            }
        }

        if(empty($_POST["nasci_paci"])){
            $nasciPaci = "Data de Nascimento do Paciente Obrigatório";
        } else {
            $nasciPaci = teste_entrada($_POST["nasci_paci"]);
        } 
        // echo "<p>$nomeResp</p><br>";
        // echo "<p>$emailResp</p><br>";
        // echo "<p>$telResp</p><br>";
        // echo "<p>$nomePaci</p><br>";
        // echo "<p>$nasciPaci</p><br>";

        $cabelo = (string)$_POST['cabelo_scr'];
        echo "<p>$cabeloImg</p><br>";

    }
    
    
    

?>
    
</body>
</html>