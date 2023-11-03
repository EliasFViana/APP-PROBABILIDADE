<?php
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Função para validar pares de números
function validatePairs($pairs) {
    foreach ($pairs as $pair) {
        $numbers = explode(',', $pair);
        foreach ($numbers as $number) {
            $num = intval(trim($number));
            if ($num < 1 || $num > 60) {
                return false;
            }
        }
    }
    return true;
}

// Recupere os dados do formulário

 $sql = "INSERT INTO CalculadoraEstatistica (dado1, dado2, dado3, dado4, dado5, dado6, dado7) VALUES ($data1, $data2, $data3, $data4, $data5, $data6, $data7)";
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$data3 = $_POST['data3'];
$data4 = $_POST['data4'];
$data5 = $_POST['data5'];
$data6 = $_POST['data6'];
$data7 = $_POST['data7'];
// Recupere os outros campos de dados...


// Validação dos campos de dados
$validacao = true;

if (!validatePairs(explode(' ', $data1))) {
    $validacao = false;
}

if (!validatePairs(explode(' ', $data2))) {
    $validacao = false;
}
if (!validatePairs(explode(' ', $data3))) {
    $validacao = false;
}

if (!validatePairs(explode(' ', $data4))) {
    $validacao = false;
}
if (!validatePairs(explode(' ', $data5))) {
    $validacao = false;
}

if (!validatePairs(explode(' ', $data6))) {
    $validacao = false;
}
if (!validatePairs(explode(' ', $data7))) {
    $validacao = false;
}


// Valide os outros campos de dados...

if ($validacao) {
    // Todos os dados são válidos, continue com o processamento
    // Inserção no banco de dados
    $sql = "INSERT INTO CalculadoraEstatistica (dado1, dado2, dado3, dado4, dado5, dado6, dado7) 
            VALUES ($data1, $data2, $data3, $data4, $data5, $data6, $data7)";
    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
} else {
    // Pelo menos uma validação falhou, exiba uma mensagem de erro
    echo "Erro: Pelo menos um dos campos não está no intervalo de 01 a 60.";
}

// Fecha a conexão
$conn->close();
?>