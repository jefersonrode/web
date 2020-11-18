<?php
if (isset($_GET["IDTerritorio"]))
$id = $_GET["IDTerritorio"];

try{
    if (isset($id)){
        $stmt = $conn->prepare('SELECT funcionarios_territorios.* FROM funcionarios_territorios WHERE IDTerritorio = :IDTerritorio');
        $stmt->bindParam(':IDTerritorio', $id, PDO::PARAM_INT);
    }else {
        $stmt = $conn->prepare('SELECT funcionarios_territorios.* FROM funcionarios_territorios');
    }
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>

<table border="1" class="table table-striped">
    <tr>
        <td>Código Territorio</td>
        <td>Código Cliente</td>
        <td>Ações</td>
    </tr>
    <?php
        if (count($result)){
            foreach($result as $row){
                ?>
                    <tr>
                        <td><?=$row['IDTerritorio']?></td>
                        <td><?=$row['IDFuncionario']?></td>
                        <td>
                            <a href="?modulo=funcionarios_territorios&pagina=alterar&IDTerritorio=<?=$row['IDTerritorio']?>">Alterar</a>
                            <a href="?modulo=funcionarios_territorios&pagina=deletar&IDTerritorio=<?=$row['IDTerritorio']?>">Excluir</a>
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
