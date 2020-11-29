jjjkkjk
<?php
if (isset($_POST['deletar'])){
    try {
        $stmt = $conn->prepare("delete FROM transportadoras WHERE IDTransportadora = :IDTransportadora");
        $stmt->execute(array('IDTransportadora' => $_GET['IDTransportadora']));
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
    if (isset($_GET['IDTransportadora'])) {
        $stmt = $conn->prepare("select * from transportadoras where IDTransportadora = :IDTransportadora");
        $stmt->bindParam(':IDTransportadora', $_GET['IDTransportadora'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $transportadora = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="nome" value="<?=$transportadora[0]['IDTransportadora']?> - <?=$transportadora[0]['NomeConpanhia']?>" disabled>
    Deseja realmente excluir esse cadastro?
    <input type="submit" name="deletar" value="Confirmar">
</form>