<?php
    if(isset($_POST)){
        $nome = $_POST["nome"];
        $idCate = $_POST["categoria"];

        $sql = "INSERT into categoria (id, nome) Values (:id, :nome)";

        $consulta = $pdo->prepare($sql);
        $consulta->binParam(":id",$idCate);
        $consulta->bindParam(":nome",$nome);
        $consulta->excute();

    }