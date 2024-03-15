
<?php

    //Aqui chamamos os scripts feitos anteriormente com suas funções
    require 'conectaBanco.php';
    require 'insereJson.php';

   
    
    //Queremos aqui gerar uma função que insere os valores da nossa variavel json no banco de dados MySQL
    function atualizaEstoque($jsonDecodificado){
        
        //Para isso puxamos a função conexão feita no script "conectaBanco.php", e atribuimos ela a uma variavel "conexao"
        $conexao = conectar();
        //Aqui é só um teste que retornara se temos algo dentro da nossa variavel conexão
        var_dump($conexao);

        //Atribuimos um comando SQL para a variavel "sql"
        $sql = "INSERT INTO estoque(produto, cor, deposito, data_disponibilidade, quantidade)
                VALUES(:produto, :cor, :tamanho, :deposito, :data_disponibilidade, :quantidade);";


        //Atribuimos a variavel stmt a função prepare recebendo nosso comando SQL feito acima
        //assim facilitaremoso proximo processo deixando-o mais enxuto
        $stmt = $conexao->prepare($sql);

        //Tentaremos aqui inserir cada item dos nossos objetos json ao banco de dados
        try{
            //iniciamos o processo na variavel conexão com a função beginTransaction()
            $conexao->beginTransaction();

            //Aqui faremos o codigo ler cada objeto do nosso arquivo
            foreach ($jsonDecodificado as $item){
            
            //Passando item a item 
            $stmt->bindParam(':produto', $item['produto']);
            $stmt->bindParam(':cor', $item['cor']);
            $stmt->bindParam(':tamanho', $item['tamanho']);
            $stmt->bindParam(':deposito', $item['deposito']);
            $stmt->bindParam(':data_disponibilidade', $item['data_disponibilidade']);
            $stmt->bindParam(':quantidade', $item['quantidade']);
            //Apos inserir o dado completo acima pode-se executar a linha
            $stmt->execute();
            }
            //Apos todas as linhas serem executadas o comando pode ser commitado
            $conexao->commit();
            //Teste para debug
            echo "Estoque atualizado com sucesso!";
        }//Caso algo de errado na tentativa acima o comando abaixo excluira o progresso do comando errado efetuado e liberara uma mensagem de erro 
        catch (PDOException $e){
            $conexao->rollBack();
            die("Erro ao atualizar estoque: ".$e->getMessage());
        }

        

    }

//Agora simplesmente executaremos a função criada acima
atualizaEstoque($jsonDecodificado)
?>