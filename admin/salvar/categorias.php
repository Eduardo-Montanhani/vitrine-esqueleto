<?php
    //Ele ira verificar se o POST realmente existe e vai pegar os valores que existe no campo
    if(isset($_POST)){
        //aqui ele pega os valores que estao no campo nome e id e salva nas suas devidas variaveis
       $id = $_POST["id"] ?? NULL;
       $nome = $_POST["nome"] ?? NULL;

       //aqui ele ira validar se esta vazio e se estiver mandar uma mensagem 
        if(empty($nome)){
            mensagemErro("Preencha o nome da categoria");
        }

        //fazer o select no banco para ver se existe o id e caso nao exista guardar
            $sql ="SELECT id FROM categoria WHERE nome = :nome and id <> :id";
     //aqui se cria uma variavel chamada de consulta para que ela transforme na variavel pdo, que e responsavel pela conexao com o banco de dados e faz com que seja lida
            $consulta = $pdo->prepare($sql);
    //aqui ela pega os valores colocados e troca pelo ":nome, :id" que sao passados 
            $consulta->bindParam(":nome",$nome);
            $consulta->bindParam(":id",$id);
    //apenas executa o sql
            $consulta->execute();

            //aqui pega os dados apos se executar e as transforma em objetos para poder ter acesso
        $dados = $consulta->fetch(PDO::FETCH_OBJ);
    //aqui ele ira verificar se ja existe o id passado, caso nao ira salvar mas se ja existir ira mandar uma mensagem avisando
        if(!empty($dados->id)){
            mensagemErro("Ja existe essa categoria !!");

        }
        //aqui ira verificar se esta vazia caso sim o ira inserir por meio do INSERT na tabela e caso nao esteja
        //ele ira atualizar por meio criado no else usando o UPDATE
        if(empty($id)){

            $sql ="INSERT INTO categoria (nome) VALUES (:nome)";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(":nome",$nome);
            
        }else{
            $sql="UPDATE categoria SET nome= :nome where id = :id";
            $consulta= $pdo->prepare($sql);
            $consulta->bindParam(":nome",$nome);
            $consulta->bindParam(":id",$id);
        }
        //aqui ira ver se esta tudo certo ao excutar, caso sim ele ira gravar os dados, caso nao ira exibir a mensagem de erro
        if(!$consulta->execute()){
            mensagemErro("Nao foi possivel salvar");
        }
        //aqui ele muda de local para o arquivo que esta dentro da pasta lista
            echo "<script>location.href='lista/categorias'</script>";
            exit;
    }