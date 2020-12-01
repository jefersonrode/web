<?php
if (isset($_POST['salvar'])){
    try {
        $stmt = $conn->prepare("update categorias set descricao = :descricao where IDCategoria = :IDCategoria");
        $stmt->execute(array(
            'descricao'   => $_POST['descricao'],
            'IDCategoria' => $_GET['IDCategoria']
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
    if (isset($_GET['IDCategoria'])) {
        $stmt = $conn->prepare("select * from categorias where IDCategoria = :IDCategoria");
        $stmt->bindParam(':IDCategoria', $_GET['IDCategoria'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $categorias = $stmt->fetchAll();
?>
<div>
    Alterar cadastro da Categoria
</div>
<hr>
<form method="post">
    <input type="text" name="descricao" value="<?=$categorias[0]['Descricao']?>">
    <input type="submit" name="salvar" value="Salvar">
</form>