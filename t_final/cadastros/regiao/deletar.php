<?php
if (isset($_POST['deletar'])){
    try {
        $stmt = $conn->prepare("delete FROM regiao WHERE IDRegiao = :IDRegiao");
        $stmt->execute(array('IDRegiao' => $_GET['IDRegiao']));
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
    if (isset($_GET['IDRegiao'])) {
        $stmt = $conn->prepare("select * from regiao where IDRegiao = :IDRegiao");
        $stmt->bindParam(':IDRegiao', $_GET['IDRegiao'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $regiao = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="nome" value="<?=$regiao[0]['IDRegiao']?> - <?=$regiao[0]['DescricaoRegiao']?>" disabled>
    Deseja realmente excluir esse cadastro?
    <input type="submit" name="deletar" value="Confirmar">
</form>