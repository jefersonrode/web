<?php
if (isset($_POST['salvar'])){
    try {
        $stmt = $conn->prepare("update transportadoras set NomeConpanhia = :NomeConpanhia, Telefone = :Telefone where IDTransportadora = :IDTransportadora");
        $stmt->execute(array(
            'NomeConpanhia'    => $_POST['NomeConpanhia'],
            'IDTransportadora' => $_GET['IDTransportadora'],
            'Telefone'         => $_POST['Telefone']
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
    if (isset($_GET['IDTransportadora'])) {
        $stmt = $conn->prepare("select * from transportadoras where IDTransportadora = :IDTransportadora");
        $stmt->bindParam(':IDTransportadora', $_GET['IDTransportadora'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $transportadora = $stmt->fetchAll();
?>
<div>Alterar Cadastro da Transportadoras</div>
<hr>
<form method="post">

<div class="row">
    <div class="col-4">
        <label for="NomeConpanhia">Nome da Companhia</label>
        <input class="form-control" type="text" name="NomeConpanhia" value="<?=$transportadora[0]['NomeConpanhia']?>">
    </div>
    <div class="col-8">
        <label for="Telefone">Telefone</label>
        <input class="form-control" type="text" name="Telefone" value="<?=$transportadora[0]['Telefone']?>">
    </div>
</div>
<br>
    <input type="submit" name="salvar" value="Salvar">
</form>