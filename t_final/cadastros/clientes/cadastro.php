<?php
if (isset($_POST['gravar'])){
    try {
        $stmt = $conn->prepare('INSERT INTO clientes (IDCliente, NomeCompanhia, NomeContato, TituloContato, Endereco, Cidade, Regiao, CEP, Pais, Telefone,Fax) 
                                VALUES (:IDCliente, :NomeCompanhia, :NomeContato, :TituloContato, :Endereco, :Cidade, :Regiao, :CEP, :Pais, :Telefone, :Fax)');
    
    $stmt->execute(array(
        'IDCliente'       => $_POST["IDCliente"],
        'NomeCompanhia'   => $_POST["NomeCompanhia"],
        'NomeContato'     => $_POST["NomeContato"],
        'TituloContato'   => $_POST["TituloContato"],
        'Endereco'        => $_POST["Endereco"],
        'Cidade'          => $_POST["Cidade"],
        'Regiao'          => $_POST["Regiao"],
        'CEP'             => $_POST["CEP"],
        'Pais'            => $_POST["Pais"],
        'Telefone'        => $_POST["Telefone"],
        'Fax'             => $_POST["Fax"]
    ));
?>

    <div class="alert alert-success">
        Sucesso! Registro Salvo.
    </div>

<?php
    } catch(PDOException $e) {
        echo "Erro: {$e->getMessage()}";
    }
}
?>

<label>Cadastro de Clientes</label>
<hr>
<form method="post">
    <div class="row">
        <div class="col-3">
            <label for="IDCliente" class="form-control-plaintext">ID Cliente</label>
            <input type="text" class="form-control" name="IDCliente" id="IDCliente" placeholder="IDCliente" required >
        </div>
        <div class="col-9">
            <label for="NomeCompanhia" class="form-control-plaintext">Nome da Companhia</label>
            <input type="text" class="form-control" name="NomeCompanhia" id="NomeCompanhia" placeholder="Nome Companhia" required>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <label for="NomeContato" class="form-control-plaintext">Nome do Contato</label>
            <input type="text" class="form-control" name="NomeContato" id="NomeContato" placeholder="Nome Contato" required>
        </div>
        <div class="col-5">
            <label for="TituloContato" class="form-control-plaintext">Titulo Contato</label>
            <input type="text" class="form-control" name="TituloContato" id="TituloContato" placeholder="Titulo Contato" required>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="Endereco" class="form-control-plaintext">Endereco</label>
            <input type="text" class="form-control" name="Endereco" id="Endereco" placeholder="Endereco" required>
        </div>
        <div class="col-4">
            <label for="Cidade" class="form-control-plaintext">Cidade</label>
            <input type="text" class="form-control" name="Cidade" id="Cidade" placeholder="Cidade" required>
        </div>
        <div class="col-4">
            <label for="CEP" class="form-control-plaintext">CEP</label>
            <input type="number" class="form-control" name="CEP" id="CEP" placeholder="CEP" required>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="Pais" class="form-control-plaintext">Pais</label>
            <input type="text" class="form-control" name="Pais" id="Pais" placeholder="Pais" required>
        </div>
        <div class="col-4">
            <label for="Telefone" class="form-control-plaintext">Telefone</label>
            <input type="number" class="form-control" name="Telefone" id="Telefone" placeholder="Telefone" required>
        </div>
        <div class="col-4">
            <label for="Fax" class="form-control-plaintext">Fax</label>
            <input type="number" class="form-control" name="Fax" id="Fax" placeholder="Fax" >
        </div>
    </div>
<br>
    <input class="btn btn-primary" type="submit" name="gravar" value="Gravar">
</form>
<hr>
