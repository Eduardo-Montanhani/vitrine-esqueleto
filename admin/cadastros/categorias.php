<?php

    var_dump($id);

    if(!empty($id)){
        //consulta banco de dados
        $sql= "SELECT * FROM categorias WHERE id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id",$id);
        $consulta->execute();

        $dados= $consulta->fetchAll(PDO::FETCH_OBJ);

        print_r($dados);

       
    }


?>




<!-- form com campo de id , nome e botao -->
<div class="card">
    <div class="card-header">
    <h2 class="float-left">Cadastros de categorias</h2>

    <div class="float-right">
             <a href="listar/categorias" class="btn btn-success">
            Listar categorias
             </a>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="salvar/categorias">
            <label for="id">ID da categoria</label>
            <input type="text" name="id" id="id" class="form-control" value="<?=$dados?>" placeholder="Digite o nome:">

            <label for="nome">Nome da categoria</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?=$dados?>" placeholder="Digite o id:">

            <br>

            <button type="submit" class="btn btn-success">Salvar Dados</button>

        </form>
    </div>
</div>