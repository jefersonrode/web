<?php
if (isset($_POST['salvar'])){
    try {
        $stmt = $conn->prepare("update fornecedores set NomeCompanhia = :NomeCompanhia where IDFornecedor = :IDFornecedor");
        $stmt->execute(array(
            'NomeCompanhia' => $_POST['NomeCompanhia'],
            'IDFornecedor' => $_GET['IDFornecedor']
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
    if (isset($_GET['IDFornecedor'])) {
        $stmt = $conn->prepare("select * from fornecedores where IDFornecedor = :IDFornecedor");
        $stmt->bindParam(':IDFornecedor', $_GET['IDFornecedor'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $fornecedores = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="NomeCompanhia" value="<?=$fornecedores[0]['NomeCompanhia']?>">
    <input type="submit" name="salvar" value="Salvar">
</form>