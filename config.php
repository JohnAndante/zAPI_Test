<?php
    //incluir uma função que mostra uma mensagem e retorna para a tela anterior
    function mensagem($msg) {
        echo "<script>alert('{$msg}');history.back();</script>";
    }
?>
