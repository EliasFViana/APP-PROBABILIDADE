CREATE TABLE CalculadoraEstatistica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dado1 DECIMAL(10, 2),
    dado2 DECIMAL(10, 2),
    dado3 DECIMAL(10, 2),
    dado4 DECIMAL(10, 2),
    dado5 DECIMAL(10, 2),
    dado6 DECIMAL(10, 2),
    dado7 DECIMAL(10, 2),
    resposta DECIMAL(10, 2)
);

CREATE TABLE tabela_de_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_de_usuario VARCHAR(150) NOT NULL,
    senha VARCHAR(150) NOT NULL
);


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
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$data3 = $_POST['data3'];
$data4 = $_POST['data4'];
$data5 = $_POST['data5'];
$data6 = $_POST['data6'];
$data7 = $_POST['data7'];

// Recupere os outros campos de dados...

// Valide os pares de números
if (!validatePairs(explode(' ', $data1))) {
    echo "Erro: Os números do Dado 1 não estão no intervalo de 01 a 60.";
} else if (!validatePairs(explode(' ', $data2))) {
    echo "Erro: Os números do Dado 2 não estão no intervalo de 01 a 60.";
}
// Valide os outros campos de dados...

// Se todos os dados forem válidos, continue com o processamento

// Exemplo: Inserir os dados no banco de dados
$sql = "INSERT INTO CalculadoraEstatistica (dado1, dado2) 
VALUES ('$data1', '$data2','$data1', '$data2','$data1', '$data2')";
if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso.";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>

