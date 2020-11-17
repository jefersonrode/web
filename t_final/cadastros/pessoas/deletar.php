<?php
if (isset($_POST['deletar'])){
    try {
        $stmt = $conn->prepare("delete from pessoas where id = :id");
        $stmt->execute(array('id' => $_GET['id']));
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
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare("select * from pessoas where id = :id");
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $pessoa = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="nome" value="<?=$pessoa[0]['id']?> - <?=$pessoa[0]['nome']?>" disabled>
    Deseja realmente excluir esse cadastro?
    <input type="submit" name="deletar" value="Confirmar">
</form>