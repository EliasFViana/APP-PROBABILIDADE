<?php
// Função para calcular a média dos números
function calcularMedia($data) {
    $pairs = explode(',', $data);
    $total = 0;
    $count = 0;

    foreach ($pairs as $pair) {
        $numbers = explode(' ', trim($pair));
        foreach ($numbers as $number) {
            $num = intval($number);
            $total += $num;
            $count++;
        }
    }

    return $count > 0 ? $total / $count : 0;
}

// Função para gerar uma sequência de números aleatórios entre 01 e 60
function gerarSequencia() {
    $sequencia = [];
    for ($i = 0; $i < 6; $i++) {
        $numero = mt_rand(1, 60); // Gera um número aleatório entre 01 e 60
        $sequencia[] = str_pad($numero, 2, '0', STR_PAD_LEFT); // Formata com dois dígitos
    }
    return implode(', ', $sequencia);
}

// Recupere os dados do formulário
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$data3 = $_POST['data3'];
$data4 = $_POST['data4'];
$data5 = $_POST['data5'];
$data6 = $_POST['data6'];
$data7 = $_POST['data7'];

// Calcula a média e gera sequências de números
$media1 = calcularMedia($data1);
$sequencia1 = gerarSequencia();
$media2 = calcularMedia($data2);
$sequencia2 = gerarSequencia();
$media3 = calcularMedia($data3);
$sequencia3 = gerarSequencia();
$media4 = calcularMedia($data4);
$sequencia4 = gerarSequencia();
$media5 = calcularMedia($data5);
$sequencia5 = gerarSequencia();
$media6 = calcularMedia($data6);
$sequencia6 = gerarSequencia();
$media7 = calcularMedia($data7);
$sequencia7 = gerarSequencia();

// Saída dos resultados
echo "Média do Dado 1: $media1<br>";
echo "Sequência de Números para o Dado 1: $sequencia1<br>";

echo "Média do Dado 2: $media2<br>";
echo "Sequência de Números para o Dado 2: $sequencia2<br>";

echo "Média do Dado 3: $media3<br>";
echo "Sequência de Números para o Dado 3: $sequencia3<br>";

echo "Média do Dado 4: $media4<br>";
echo "Sequência de Números para o Dado 4: $sequencia4<br>";

echo "Média do Dado 5: $media5<br>";
echo "Sequência de Números para o Dado 5: $sequencia5<br>";

echo "Média do Dado 6: $media6<br>";
echo "Sequência de Números para o Dado 6: $sequencia6<br>";

echo "Média do Dado 7: $media7<br>";
echo "Sequência de Números para o Dado 7: $sequencia7<br>";
?>