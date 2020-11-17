<?php
if (isset($_POST['salvar'])){
    try {
        $stmt = $conn->prepare("update pessoas set nome = :nome where id = :id");
        $stmt->execute(array(
            'nome' => $_POST['nome'],
            'id' => $_GET['id']
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
    if (isset($_GET['id'])) {
        $stmt = $conn->prepare("select * from pessoas where id = :id");
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $pessoa = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="nome" value="<?=$pessoa[0]['nome']?>">
    <input type="submit" name="salvar" value="Salvar">
</form>