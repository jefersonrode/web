<?php
if (isset($_POST['logar'])) {
    $stmt = $conn->prepare('select login from usuarios where login = :login and password=:password');
    $stmt->bindParam(':login', $_POST['login']);
    $stmt->bindParam(':password', $_POST['senha']);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if ($_POST['login']==$result[0]['login']) {
        $_SESSION['usuariologado'] = true;
    }else {
        $_SESSION['errologin'] = true;
    }
}