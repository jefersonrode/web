<?php
if (isset($_GET["id"]))
$id = $_GET["id"];

try{
    if (isset($id)){
        $stmt = $conn->prepare('SELECT pessoas.* FROM pessoas WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    }else {
        $stmt = $conn->prepare('SELECT pessoas.* FROM pessoas');
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
                        <td><?=$row['id']?></td>
                        <td><?=$row['nome']?></td>
                        <td>
                            <a href="?modulo=pessoas&pagina=alterar&id=<?=$row['id']?>">Alterar</a>
                            <a href="?modulo=pessoas&pagina=deletar&id=<?=$row['id']?>">Excluir</a>
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
