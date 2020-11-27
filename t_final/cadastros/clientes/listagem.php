<?php
if (isset($_GET["IDCliente"]))
$id = $_GET["IDCliente"];

try{
    if (isset($id)){
        $stmt = $conn->prepare('SELECT clientes.* FROM clientes WHERE IDCliente = :IDCliente');
        $stmt->bindParam(':IDCliente', $id, PDO::PARAM_STR_CHAR);
    }else {
        $stmt = $conn->prepare('SELECT clientes.* FROM clientes');
    }
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>

<table border="1" class="table table-striped">
    <tr>
        <td>Código</td>
        <td>Nome</td>
        <td>Ações</td>
    </tr>
    <?php
        if (count($result)){
            foreach($result as $row){
                ?>
                    <tr>
                        <td><?=$row['IDCliente']?></td>
                        <td><?=$row['NomeCompanhia']?></td>
                        <td>
                            <a class="btn btn-primary" href="?modulo=clientes&pagina=alterar&IDCliente=<?=$row['IDCliente']?>">Alterar</a>
                            <a class="btn btn-warning" href="?modulo=clientes&pagina=deletar&IDCliente=<?=$row['IDCliente']?>">Excluir</a>
                        </td>
                    </tr>
                    <?php
            }
        }else{
            echo "<tr><td colspan=\"3\">Nenhum resultado retornado</td></tr>";
        }
    ?>
</table>

<?php
    } catch(PDOException $e){
    echo "Erro: {$e->getMessage()}";
    }
