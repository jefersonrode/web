<?php
if (isset($_POST['gravar'])){
    try {
        $stmt = $conn->prepare("insert into cidades (codigo, nome, estado) values (:codigo, :nome, :estado)");
    
    $stmt->execute(array(
        'codigo' => $_POST["codigo"],
        'nome'   => $_POST["nome"],
        'estado' => $_POST["estado"]
    ));

    } catch(PDOException $e) {
        echo "Erro: {$e->getMessage()}";
    }
}
?>

<form method="post">
    <div class="form-group">
        <label for="codigo">Código</label>
        <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código">
    </div>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>

    <?php
        $stmt = $conn->prepare('select * from estados');
        $stmt->execute();
        $resultado = $stmt->fetchAll();
    ?>

    <div class="form-group">
        <label for="codigo">Estado</label>
        <select class="form-control" name="estado" id="estado">
            <option value="">** Selecione **</option>
            <?php
                foreach ($resultado as $estado) {
                    ?>
                        <option value="<?=$estado["id"]?>"><?=$estado["sigla"]?> - <?=$estado["nome"]?></option>
                    <?php
                }
            ?>
        </select>
    </div>

    <input type="submit" name="gravar" value="Gravar">
</form>