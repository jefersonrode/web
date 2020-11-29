<?php
if (isset($_POST['deletar'])){
    try {
        $stmt = $conn->prepare("delete FROM categorias WHERE IDCategoria = :IDCategoria");
        $stmt->execute(array('IDCategoria' => $_GET['IDCategoria']));
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
    if (isset($_GET['IDCategoria'])) {
        $stmt = $conn->prepare("select * from categorias where IDCategoria = :IDCategoria");
        $stmt->bindParam(':IDCategoria', $_GET['IDCategoria'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $categorias = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="nome" value="<?=$categorias[0]['IDCategoria']?> - <?=$categorias[0]['NomeCategoria']?>" disabled>
    Deseja realmente excluir esse cadastro?
    <input type="submit" name="deletar" value="Confirmar">
</form>