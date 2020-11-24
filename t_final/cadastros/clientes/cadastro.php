<?php
if (isset($_POST['gravar'])){
    try {
        $stmt = $conn->prepare('INSERT INTO pessoas (nome) values (:nome)');
        $stmt = $conn->prepare('INSERT INTO clientes (IDCliente, NomeCompanhia, NomeContato, TituloContato, Endereco, Cidade, Regiao, CEP, Pais, Telefone,Fax) 
                                                VALUES (:IDCliente, :NomeCompanhia, :NomeContato, :TituloContato, :Endereco, :Cidade, :Regiao, :CEP, :Pais, :Telefone, :Fax)');
    
    $stmt->execute(array('nome'   => $_POST["nome"]));

    } catch(PDOException $e) {
        echo "Erro: {$e->getMessage()}";
    }
}
?>

<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>

    <input type="submit" name="gravar" value="Gravar">
</form>