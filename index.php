<?php 
$url = 'localhost';
$usuario = 'root';
$senha = '';
$dataBase = '';
$link = new mysqli($url, $usuario, $senha, $dataBase);
$link->set_charset('utf8');

if ($link->connect_error) {
    die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}

echo "Conexão Okay";

$nameDataBase = "web1";
$query_create_schema = "CREATE SCHEMA IF NOT EXISTS $nameDataBase";
if ($link->query($query_create_schema) === TRUE) {
    echo "<p>Criou o Banco de Dados</p>";
} else {
    echo "<p>Não criou o banco de dados: " . $link->error . "</p>";
}

mysqli_select_db($link, $nameDataBase);

$query_create_table_resp = "CREATE TABLE IF NOT EXISTS responsavel (
    id_Resp int AUTO_INCREMENT PRIMARY KEY,
    nome_Resp varchar(45) NOT NULL,
    email_Resp varchar(200) NOT NULL,
    contato_Resp varchar(20) NOT NULL
)";
if ($link->query($query_create_table_resp) === TRUE) {
    echo "<p>Criou a tabela de Responsavel</p>";
} else {
    echo "<p>Não criou a tabela de Responsavel: " . $link->error . "</p>";
}

$query_create_table_avatar = "CREATE TABLE IF NOT EXISTS avatar (
    id_Avat int AUTO_INCREMENT PRIMARY KEY,
    pele_Avat varchar(60) NOT NULL,
    rosto_Avat varchar(60) NOT NULL,
    cabelo_Avat varchar(60) NOT NULL,
    torso_Avat varchar(60) NOT NULL,
    pernas_Avat varchar(60) NOT NULL
)";
if ($link->query($query_create_table_avatar) === TRUE) {
    echo "<p>Criou a tabela de Avatar</p>";
} else {
    echo "<p>Não criou a tabela de Avatar: " . $link->error . "</p>";
}

$query_create_table_paci = "CREATE TABLE IF NOT EXISTS paciente (
    id_Pac int AUTO_INCREMENT PRIMARY KEY,
    nome_Paci varchar(60) NOT NULL,
    dataNasci_Pac varchar(10) NOT NULL,
    id_Resp int NOT NULL,
    id_Avat int NOT NULL,
    FOREIGN KEY (id_Resp) REFERENCES responsavel(id_Resp),
    FOREIGN KEY (id_Avat) REFERENCES avatar(id_Avat)
)";
if ($link->query($query_create_table_paci) === TRUE) {
    echo "<p>Criou a tabela de Paciente</p>";
} else {
    echo "<p>Não criou a tabela de Paciente: " . $link->error . "</p>";
}

$query_create_table_form = "CREATE TABLE IF NOT EXISTS formulario (
    id_Form int AUTO_INCREMENT PRIMARY KEY,
    resp_Form varchar(15) NOT NULL,
    id_Pac int NOT NULL,
    FOREIGN KEY (id_Pac) REFERENCES paciente(id_Pac)
) ENGINE = InnoDB";
if ($link->query($query_create_table_form) === TRUE) {
    echo "<p>Criou a tabela de Formulario</p>";
} else {
    echo "<p>Não criou a tabela de Formulario: " . $link->error . "</p>";
}

$query_create_table_dentista = "CREATE TABLE IF NOT EXISTS dentista (
    id_Dent int AUTO_INCREMENT PRIMARY KEY,
    nome_Dent varchar(45) NOT NULL,
    usuario_Dent varchar(30) NOT NULL,
    senha_Dent varchar(16) NOT NULL
)";
if ($link->query($query_create_table_dentista) === TRUE) {
    echo "<p>Criou a tabela de Dentista</p>";
} else {
    echo "<p>Não criou a tabela de Dentista: " . $link->error . "</p>";
}

$query_create_table_consulta = "CREATE TABLE IF NOT EXISTS consulta (
    id_Cons int AUTO_INCREMENT PRIMARY KEY,
    procedimenti_Cons varchar(50) NOT NULL,
    data_Cons varchar(12) NOT NULL,
    id_Form int NOT NULL,
    id_Dent int NOT NULL,
    FOREIGN KEY (id_Form) REFERENCES formulario(id_Form),
    FOREIGN KEY (id_Dent) REFERENCES dentista(id_Dent)
)";
if ($link->query($query_create_table_consulta) === TRUE) {
    echo "<p>Criou a tabela de Consulta</p>";
} else {
    echo "<p>Não criou a tabela de Consulta: " . $link->error . "</p>";
}
?>
