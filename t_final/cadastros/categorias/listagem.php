<?php
if (isset($_GET["IDCategoria"]))
$id = $_GET["IDCategoria"];

try{
    if (isset($id)){
        $stmt = $conn->prepare('SELECT categorias.* FROM categorias WHERE IDCategoria = :IDCategoria');
        $stmt->bindParam(':IDCategoria', $id, PDO::PARAM_INT);
    }else {
        $stmt = $conn->prepare('SELECT categorias.* FROM categorias');
    }
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
<div>Categoria</div>
<hr>
<table border="1" class="table table-striped">
    <tr>
        <td>Código</td>
        <td>Nome</td>
        <td>Descrição</td>
        <td>Ações</td>
    </tr>
    <?php
        if (count($result)){
            foreach($result as $row){
                ?>
                    <tr>
                        <td><?=$row['IDCategoria']?></td>
                        <td><?=$row['NomeCategoria']?></td>
                        <td><?=$row['Descricao']?></td>
                        <td>
                            <a class="btn btn-primary" href="?modulo=categorias&pagina=alterar&IDCategoria=<?=$row['IDCategoria']?>">Alterar</a>
                            <a href="?modulo=categorias&pagina=deletar&IDCategoria=<?=$row['IDCategoria']?>">Excluir</a>
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
