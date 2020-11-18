<?php
if (isset($_GET["IDFuncionario"]))
$id = $_GET["IIDFuncionario"];

try{
    if (isset($id)){
        $stmt = $conn->prepare('SELECT funcionarios.* FROM funcionarios WHERE IDFuncionario = :IDFuncionario');
        $stmt->bindParam(':IDFuncionario', $id, PDO::PARAM_STR_CHAR);
    }else {
        $stmt = $conn->prepare('SELECT funcionarios.* FROM funcionarios');
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
                        <td><?=$row['IDFuncionario']?></td>
                        <td><?=$row['Nome']?> <?=$row['Sobrenome']?></td>
                        <td>
                            <a href="?modulo=funcionarios&pagina=alterar&IDFuncionario=<?=$row['IDFuncionario']?>">Alterar</a>
                            <a href="?modulo=funcionarios&pagina=deletar&IDFuncionario=<?=$row['IDFuncionario']?>">Excluir</a>
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
