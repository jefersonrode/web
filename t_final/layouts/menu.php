<?php
$stmt = $conn->prepare("select * from menu order by ordem,descricao");
$stmt->execute();

$resultado = $stmt->fetchAll();
?>
<br>
<div class="row">
    <div class="dropdown col-11">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Menu Principal
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php
            foreach($resultado as $linha) {
                ?>
                    <a class="dropdown-item" href="<?=$linha['endereco']?>" ><?=$linha['descricao']?></a>
                <?php
            }
        ?>
        </div>
    </div>
        <a class="btn btn-primary" href="?sair=1">Logout</a>
</div>

<hr>