<?php
    function conectar(){

        //Atribuição de valores para as variaveis que usaremos na conexão com o banco de dados
        $host = 'localhost';
        $dbname = 'geoteste';
        $usuario = 'root';
        $senha = 'root99';

        //Novamente uma linha para testar se o código esta rodando como esperado
        echo "<h1>testadão debug</h1>";

        //Nesse comando Try, tentaremos estabelecer conexão com o banco de dados em questão
            try{
                $conexao = new PDO("mysql: host=$host; dbname=$dbname",$usuario,$senha);
                $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                echo "<h1>Conectou</h1>";
                
            }// Caso não seja possivel estabelecer a conexão, na linha abaixo o comando rodará o erro ocorrido
             catch(PDOException $e){
                die("Erro ao conectar: ".$e->getMessage());
            }
        
    }   
?>