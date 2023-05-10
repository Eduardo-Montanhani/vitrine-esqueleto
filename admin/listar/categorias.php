

   <table class="table table-bordered table-hover table-striped">
  <thead>
    <tr>
      <td>id</td>
      <td>Nome da categoria</td>
      <td>Opçoes</td>
    </tr>
  </thead>
  <tbody>

  <?php
    $sql = "SELECT * from categoria";
    $consulta = $pdo->prepare($sql);
    $consulta->execute();
    
    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
        ?>
        <tr>
            <td><?=$dados->id?></td>
            <td><?=$dados->nome?></td>
            <td>
                <a href="cadastros/categorias/<?=$dados->id?>" class="btn btn-success">
                <i class="fas fa-edit"></i>
              </a>
            </td>
        </tr>

        <?php
    }
    ?>
  </tbody>
</table>
