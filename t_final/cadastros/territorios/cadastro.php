<?php
if (isset($_POST['gravar'])){
    try {
        $stmt = $conn->prepare("insert into territorios (IDTerritorio, DescricaoTerritorio, IDRegiao) values (:IDTerritorio, :DescricaoTerritorio, :IDRegiao)");
    
    $stmt->execute(array(
        'IDTerritorio'          => $_POST["IDTerritorio"],
        'DescricaoTerritorio'   => $_POST["DescricaoTerritorio"],
        'IDRegiao'              => $_POST["IDRegiao"]
    ));

    } catch(PDOException $e) {
        echo "Erro: {$e->getMessage()}";
    }
}
?>
<div>Cadastrar Território</div>
<hr>
<form method="post">
    <div class="form-group">
        <label for="IDTerritorio">Código</label>
        <input type="text" class="form-control" name="IDTerritorio" id="IDTerritorio" placeholder="ID Territorio">
    </div>

    <div class="form-group">
        <label for="DescricaoTerritorio">Nome</label>
        <input type="text" class="form-control" name="DescricaoTerritorio" id="DescricaoTerritorio" placeholder="DescricaoTerritorio">
    </div>

    <?php
        $stmt = $conn->prepare('select * from regiao');
        $stmt->execute();
        $resultado = $stmt->fetchAll();
    ?>

    <div class="form-group">
        <label for="IDRegiao">Codigo Região</label>
        <select class="form-control" name="IDRegiao" id="IDRegiao">
            <option value="">** Selecione **</option>
            <?php
                foreach ($resultado as $regiao) {
                    ?>
                        <option value="<?=$regiao["IDRegiao"]?>"><?=$regiao["IDRegiao"]?> - <?=$regiao["DescricaoRegiao"]?></option>
                    <?php
                }
            ?>
        </select>
    </div>

    <input type="submit" name="gravar" value="Gravar">
</form>