<?php
if (isset($_POST['deletar'])){
    try {
        $stmt = $conn->prepare("delete FROM territorios WHERE IDTerritorio = :IDTerritorio");
        $stmt->execute(array('IDTerritorio' => $_GET['IDTerritorio']));
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
    if (isset($_GET['IDTerritorio'])) {
        $stmt = $conn->prepare("select * from territorios where IDTerritorio = :IDTerritorio");
        $stmt->bindParam(':IDTerritorio', $_GET['IDTerritorio'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $territorios = $stmt->fetchAll();
?>

<form method="post">
    <input type="text" name="nome" value="<?=$territorios[0]['IDTerritorio']?> - <?=$territorios[0]['DescricaoTerritorios']?>" disabled>
    Deseja realmente excluir esse cadastro?
    <input type="submit" name="deletar" value="Confirmar">
</form>