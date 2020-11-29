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

<form method="post">
    <input type="text" name="NomeConpanhia" value="<?=$transportadora[0]['NomeConpanhia']?>">
    <input type="text" name="Telefone" value="<?=$transportadora[0]['Telefone']?>">
    <input type="submit" name="salvar" value="Salvar">
</form>