<!-- form com campo de id , nome e botao -->
<div class="card">
    <div class="card-body">
        <form method="post" action="salvar/categorias">
            <label for="id">ID da categoria:</label>
            <input type="text" name="id" id="id" class="form-control" required value=""
            placeholder="Digite o id:">

            <label for="nome">Nome da categoria:</label>
            <input type="text" name="nome" id="nome" class="form-control" required value="" 
            placeholder="Digite o nome:">
            
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </form>
    </div>
</div>