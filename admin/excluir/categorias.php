<?php
  
    $sql = "SELECT id from categoria where id = :id";

    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id);
    $consulta->execute();

    $dados = $consulta->fetch(PDO::FETCH_OBJ);
 
    if(empty($dados->id)){
        mensagemErro("Erro ao tentar deletar produto.");
    }
    $sql = "DELETE from categoria where id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id", $dados->id);

    if(($consulta->execute())){
        
        echo "<script>location.href='listar/categorias'</script>";
        exit;
    }
    


?>