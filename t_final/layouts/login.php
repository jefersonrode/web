<?php
if ($_SESSION['errologin']) {
?>
    <div class="alert alert-warning">
        Usuário ou Senha Incorreta!
    </div>
    <?php
    $_SESSION['errologin'] = false;
}
?>


<span class="d-block p-2 bg-primary text-white">TELA DE LOGIN</span>
<hr>

<form method="POST">
  <div class="form-group" >
    <label for="exampleInputEmail1" >Login</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="login" placeholder="Digite seu Login" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Digite sua senha" required>
  </div>
  <button type="submit" class="btn btn-primary" name="logar" value="Logar">Logar</button>
</form>