<?php
if (isset($_GET["IDTipoCliente"]))
$id = $_GET["IDTipoCliente"];

try{
    if (isset($id)){
        $stmt = $conn->prepare('SELECT clientes_demograficos.* FROM clientes_demograficos WHERE IDTipoCliente = :IDTipoCliente');
        $stmt->bindParam(':IDTipoCliente', $id, PDO::PARAM_STR_CHAR);
    }else {
        $stmt = $conn->prepare('SELECT clientes_demograficos.* FROM clientes_demograficos');
    }
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>

<table border="1" class="table table-striped">
    <tr>
        <td>Código</td>
        <td>Descrição</td>
        <td>Ações</td>
    </tr>
    <?php
        if (count($result)){
            foreach($result as $row){
                ?>
                    <tr>
                        <td><?=$row['IDTipoCliente']?></td>
                        <td><?=$row['DescricaoCliente']?></td>
                        <td>
                            <a href="?modulo=clientes_demograficos&pagina=alterar&IDTipoCliente=<?=$row['IDTipoCliente']?>">Alterar</a>
                            <a href="?modulo=clientes_demograficos&pagina=deletar&IDTipoCliente=<?=$row['IDTipoCliente']?>">Excluir</a>
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
