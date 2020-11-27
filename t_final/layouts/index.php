<?php

include LAYOUTS."header.php";

if ($_SESSION['usuariologado']){
include "menu.php";

if (!isset ($_GET['pagina'])){
    include 'home.php';
}else {
    include "cadastros/{$_GET['modulo']}/{$_GET['pagina']}.php";
}
}else {
    include 'login.php';
}

include "footer.php";