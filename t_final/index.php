<?php
    session_start();

    
    if (isset($_GET['sair'])) {
        session_destroy();
        session_start();
        header("Location: /web/t_final");
    }


    error_reporting(0);
   include_once(__DIR__."/bibliotecas/parametros.php");
   include BIBLIOTECAS."conexao.php";
   include BIBLIOTECAS."autenticacao.php";
   include_once(LAYOUTS."/index.php");

   //29/11 -2