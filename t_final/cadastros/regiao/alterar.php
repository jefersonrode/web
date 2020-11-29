<?php
if (isset($_POST['salvar'])){
    try {
        $stmt = $conn->prepare("update regiao set DescricaoRegiao = :DescricaoRegiao where IDRegiao = :IDRegiao");
        $stmt->execute(array(
            'DescricaoRegiao' => $_POST['DescricaoRegiao'],
            'IDRegiao' => $_GET['IDRegiao']
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
    if (isset($_GET['IDRegiao'])) {
        $stmt = $conn->prepare("select * from regiao where IDRegiao = :IDRegiao");
        $stmt->bindParam(':IDRegiao', $_GET['IDRegiao'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $regiao = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="DescricaoRegiao" value="<?=$regiao[0]['DescricaoRegiao']?>">
    <input type="submit" name="salvar" value="Salvar">
</form>