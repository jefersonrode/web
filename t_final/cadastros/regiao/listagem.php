<?php
if (isset($_GET["IDRegiao"]))
$id = $_GET["IDRegiao"];

try{
    if (isset($id)){
        $stmt = $conn->prepare('SELECT regiao.* FROM regiao WHERE IDRegiao = :IDRegiao');
        $stmt->bindParam(':IDRegiao', $id, PDO::PARAM_INT);
    }else {
        $stmt = $conn->prepare('SELECT regiao.* FROM regiao');
    }
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
<div>Região</div>
<hr>
<table border="1" class="table table-dark">
    <tr>
        <td>Código Região</td>
        <td>Descrição Região</td>
        <td>Ações</td>
    </tr>
    <?php
        if (count($result)){
            foreach($result as $row){
                ?>
                    <tr>
                        <td><?=$row['IDRegiao']?></td>
                        <td><?=$row['DescricaoRegiao']?></td>
                        <td>
                            <a class="btn btn-primary" class="btn btn-primary" href="?modulo=regiao&pagina=alterar&IDRegiao=<?=$row['IDRegiao']?>">Alterar</a>
                            <a class="btn btn-warning" href="?modulo=regiao&pagina=deletar&IDRegiao=<?=$row['IDRegiao']?>">Excluir</a>
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
