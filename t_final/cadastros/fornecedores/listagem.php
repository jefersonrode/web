<?php
if (isset($_GET["IDFornecedor"]))
$id = $_GET["IDFornecedor"];

try{
    if (isset($id)){
        $stmt = $conn->prepare('SELECT fornecedores.* FROM fornecedores WHERE IDFornecedor = :IDFornecedor');
        $stmt->bindParam(':IDFornecedor', $id, PDO::PARAM_STR_CHAR);
    }else {
        $stmt = $conn->prepare('SELECT fornecedores.* FROM fornecedores');
    }
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
<div>Fornecedores</div>
<hr>
<table border="1" class="table table-striped">
    <tr>
        <td>Código</td>
        <td>Nome</td>
        <td>Contato</td>
        <td>Ações</td>
    </tr>
    <?php
        if (count($result)){
            foreach($result as $row){
                ?>
                    <tr>
                        <td><?=$row['IDFornecedor']?></td>
                        <td><?=$row['NomeCompanhia']?></td>
                        <td><?=$row['NomeContato']?></td>
                        <td>
                            <a class="btn btn-primary" href="?modulo=fornecedores&pagina=alterar&IDFornecedor=<?=$row['IDFornecedor']?>">Alterar</a>
                            <a class="btn btn-warning" href="?modulo=fornecedores&pagina=deletar&IDFornecedor=<?=$row['IDFornecedor']?>">Excluir</a>
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
