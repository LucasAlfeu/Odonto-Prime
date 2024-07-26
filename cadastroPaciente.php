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
                        <input class="avatar__input" type="text" name="cabelo_lego" id="cabelo_lego" value="1">
                        <input type="button" value="→" class="btn" onclick="aumentarCabelo(document.getElementById('cabelo_lego'), document.getElementById('cabelo_image'))"">
                    </div>
                    <div class="avatar__box">
                        Rosto: 
                        <input type="button" value="←" class="btn" onclick="diminuirRosto(document.getElementById('rosto_lego'), document.getElementById('rosto_image'))">
                        <input class="avatar__input" type="text" name="rosto_lego" id="rosto_lego" value="1">
                        <input type="button" value="→" class="btn" onclick="aumentarRosto(document.getElementById('rosto_lego'), document.getElementById('rosto_image'))">
                    </div>
                    <div class="avatar__box">
                        Pele: 
                        <input type="button" value="←" class="btn" onclick="diminuirPele(document.getElementById('pele_lego'), document.getElementById('pele_image'))">
                        <input class="avatar__input" type="text" name="pele_lego" id="pele_lego" value="1">
                        <input type="button" value="→" class="btn" onclick="aumentarPele(document.getElementById('pele_lego'), document.getElementById('pele_image'))">
                    </div>
                    <div class="avatar__box">
                        Tronco: 
                        <input type="button" value="←" class="btn" onclick="diminuirTorso(document.getElementById('tronco_lego'), document.getElementById('tronco_image'))">
                        <input class="avatar__input" type="text" name="tronco_lego" id="tronco_lego" value="1">
                        <input type="button" value="→" class="btn" onclick="aumentarTorso(document.getElementById('tronco_lego'), document.getElementById('tronco_image'))">
                    </div>
                    <div class="avatar__box">
                        Pernas: 
                        <input type="button" value="←" class="btn" onclick="diminuirPerna(document.getElementById('pernas_lego'), document.getElementById('pernas_image'))">
                        <input class="avatar__input" type="text" name="pernas_lego" id="pernas_lego" value="1">
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

        $cabeloAux = $_POST["cabelo_lego"];
        $rostoAux = $_POST["rosto_lego"];
        $peleAux = $_POST["pele_lego"];
        $torsoAux = $_POST["tronco_lego"];
        $pernasAux = $_POST["pernas_lego"];

        $cabelo = "./assets/images/cabelo/".$cabeloAux.".png";
        $rosto = "./assets/images/rosto/".$rostoAux.".png";
        $pele = "./assets/images/pele/".$peleAux.".png";
        $troso = "./assets/images/torso/".$torsoAux.".png";
        $pernas = "./assets/images/pernas/".$pernasAux.".png";

        $url = 'localhost';
        $usuario = 'root';
        $senha = '';
        $dataBase = 'web1';
        $link = new mysqli($url, $usuario, $senha, $dataBase);
        $link->set_charset('utf8');

        
        
        //$query_resp = "INSERT INTO responsavel(nome_Resp, email_Resp, tel_Resp) VALUES(:nome, :email: tel)";
        $query_resp ="INSERT INTO responsavel(nome_Resp, email_Resp, tel_Resp) VALUES(?,?,?)";
        $stmt = $link->prepare($query_resp);
        $stmt->bind_param("sss", $nomeResp, $emailResp, $telResp);

        if ($stmt->execute()) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }
        

        // $query_avatar = "INSERT INTO avatar(pele_Avat, rosto_Avat, cabelo_Avat, torso_Avat, pernas_Avat) VALUES (:pele, :rosto, :cabelo, :torso, :pernas)"
        // or die("Error in the create Responsavel table...".$link->connect_error);
        // $resul_avatar = $link->prepare($query_avatar);
        // $resul_avatar->bind_param(":pele", $pele);
        // $resul_avatar->bind_param(":rosto", $rosto);
        // $resul_avatar->bind_param(":cabelo", $cabelo);
        // $resul_avatar->bind_param(":torso", $torso);
        // $resul_avatar->bind_param(":pernas", $pernas);
        // $resul_avatar->execute();

    }
?>
    <script src="./assets/scripts/javascript/moldaAvatar.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
</html>