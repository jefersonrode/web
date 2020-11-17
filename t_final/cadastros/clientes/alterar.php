<?php
if (isset($_POST['salvar'])){
    try {
        $stmt = $conn->prepare("update clientes set NomeCompanhia = :NomeCompanhia where IDCliente = :IDCliente");
        $stmt->execute(array(
            'NomeCompanhia' => $_POST['NomeCompanhia'],
            'IDCliente' => $_GET['IDCliente']
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
    if (isset($_GET['IDCliente'])) {
        $stmt = $conn->prepare("select * from clientes where IDCliente = :IDCliente");
        $stmt->bindParam(':IDCliente', $_GET['IDCliente'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $pessoa = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="NomeCompanhia" value="<?=$pessoa[0]['NomeCompanhia']?>">
    <input type="submit" name="salvar" value="Salvar">
</form>