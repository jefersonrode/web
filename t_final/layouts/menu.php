<?php
$stmt = $conn->prepare("select * from menu order by ordem,descricao");
$stmt->execute();

$resultado = $stmt->fetchAll();
?>

<div class="row">
    <?php
        foreach($resultado as $linha) {
            ?>
                <a href="<?=$linha['endereco']?>" class="<?=$linha['classe']?>"><?=$linha['descricao']?></a>
            <?php
        }
    ?>
        <a href="?sair=1" class="btn btn-link" >Sair</a>
    </div>
    <hr>