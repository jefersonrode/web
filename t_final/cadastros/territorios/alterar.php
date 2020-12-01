<?php
if (isset($_POST['salvar'])){
    try {
        $stmt = $conn->prepare("update territorios set IDTerritorio = :IDTerritorio,
        DescricaoTerritorio = :DescricaoTerritorio, IDRegiao = :IDRegiao
        where IDTerritorio = :IDTerritorio");
        $stmt->execute(array(
        'IDTerritorio'          => $_POST["IDTerritorio"],
        'DescricaoTerritorio'   => $_POST["DescricaoTerritorio"],
        'IDRegiao'              => $_POST["IDRegiao"]
        ));
        ?>
            <div class="alert alert-success">
                Sucesso! O registro foi atualizado.
            </div>
        <?php
    }catch(PDOException $e) {
        echo "Erro: {$e->getMessage()}";
    }
}
?>

<?php
    if (isset($_GET['IDTerritorio'])) {
        $stmt = $conn->prepare("select * from territorios where IDTerritorio = :IDTerritorio");
        $stmt->bindParam(':IDTerritorio', $_GET['IDTerritorio'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $territorio = $stmt->fetchAll();
?>
<div>Alterar Cadastro do Território</div>
<hr>
<form method="post">

    <div class="row">
        <div class="col-4">
            <label for="IDTerritorio">ID do Território</label>
            <input class="form-control" type="text" name="IDTerritorio" value="<?=$territorio[0]['IDTerritorio']?>">   
        </div>
        <div class="col-8">
            <label for="IDTerritorio">Descricao do Território</label>
            <input class="form-control" type="text" name="DescricaoTerritorio" value="<?=$territorio[0]['DescricaoTerritorio']?>">
        </div>
    </div>
    <?php
        $stmt = $conn->prepare('select * from regiao');
        $stmt->execute();
        $resultado = $stmt->fetchAll();
    ?>

    <div class="form-group">
        <label for="IDRegiao">Região</label>
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
        <br>
    <input class="btn btn-primary" type="submit" name="salvar" value="Salvar">
    <hr>
</form>