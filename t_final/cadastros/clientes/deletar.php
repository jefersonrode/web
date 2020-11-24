<?php
if (isset($_POST['deletar'])){
    try {
        $stmt = $conn->prepare("DELETE FROM clientes WHERE IDCliente = :IDCliente");
        $stmt->execute(array('IDCliente' => $_GET['IDCliente']));
        ?>
            <div class="alert alert-success">
                Sucesso! O registro foi deletado.
            </div>
        <?php
        exit();
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
    $clientes = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="nome" value="<?=$clientes[0]['IDCliente']?> - <?=$clientes[0]['NomeCompanhia']?>" disabled>
    Deseja realmente excluir esse cadastro?
    <input type="submit" name="deletar" value="Confirmar">
</form>