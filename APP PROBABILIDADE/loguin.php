<?php
                $servername = "seu_servidor";
                $username = "seu_usuario";
                $password = "sua_senha";
                $dbname = "seu_banco_de_dados"; // Nome do banco de dados para o login
                
                // Cria uma conexão com o banco de dados
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Verifica a conexão
                if ($conn->connect_error) {
                    die("Erro na conexão: " . $conn->connect_error);
                }
                
                // Função para validar o login
                function validateLogin($username, $password, $conn) {
                    $username = mysqli_real_escape_string($conn, $username);
                    $password = mysqli_real_escape_string($conn, $password);
                
                    $sql = "SELECT * FROM tabela_de_login WHERE nome_de_usuario='$username' AND senha='$password'";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        return true; // Credenciais válidas
                    } else {
                        return false; // Credenciais inválidas
                    }
                }
                
                // Recupere os dados do formulário (nome de usuário e senha)
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                // Valide o login
                if (validateLogin($username, $password, $conn)) {
                    // Login bem-sucedido, redirecione o usuário para a página desejada
                    header("Location: pagina_protegida.php");
                    exit();
                } else {
                    // Exibira uma mensagem de erro caso o login seja inválido
                    echo "Erro: Nome de usuário ou senha incorretos.";
                }
                
                // Fecha a conexão
                $conn->close();
                ?>