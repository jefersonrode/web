<?php
if (isset($_POST['gravar'])){
    try {
        $stmt = $conn->prepare('INSERT INTO regiao (IDRegiao, DescricaoRegiao) 
                                VALUES (:IDRegiao, :DescricaoRegiao)');
    
    $stmt->execute(array(
        'IDRegiao'       => $_POST["IDRegiao"],
        'DescricaoRegiao'   => $_POST["DescricaoRegiao"]
    ));
    ?>
    <div class="alert alert-success">
                Sucesso! Registro Salvo.
            </div>
    <?php
    
    } catch(PDOException $e) {
        echo "Erro: {$e->getMessage()}";
    }
}
?>

<label>Cadastro de Região</label>
<hr>


<form method="post">
    <div class="row">
        <div class="col-3">
            <label for="IDRegiao" class="form-control-plaintext">ID Região</label>
            <input type="text" class="form-control" name="IDRegiao" id="IDRegiao" placeholder="IDRegiao" required >
        </div>
        <div class="col-9">
            <label for="DescricaoRegiao" class="form-control-plaintext">Descrição da Região</label>
            <input type="text" class="form-control" name="DescricaoRegiao" id="DescricaoRegiao" placeholder="DescricaoRegiao" required>
        </div>
    </div>
<br>
    <input class="btn btn-primary" type="submit" name="gravar" value="Gravar">
</form>
<hr>
