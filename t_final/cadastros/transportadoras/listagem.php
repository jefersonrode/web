<?php
if (isset($_GET["IDTransportadora"]))
$id = $_GET["IDTransportadora"];
try{
    if (isset($id)){
        $stmt = $conn->prepare('SELECT transportadoras.* FROM transportadoras WHERE IDTransportadora = :IDTransportadora');
        $stmt->bindParam(':IDTransportadora', $id, PDO::PARAM_INT);
    }else {
        $stmt = $conn->prepare('SELECT transportadoras.* FROM transportadoras');
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
                        <td><?=$row['IDTransportadora']?></td>
                        <td><?=$row['NomeConpanhia']?></td>
                        <td>
                            <a href="?modulo=transportadoras&pagina=alterar&IDTransportadora=<?=$row['IDTransportadora']?>">Alterar</a>
                            <a href="?modulo=transportadoras&pagina=deletar&IDTransportadora=<?=$row['IDTransportadora']?>">Excluir</a>
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
