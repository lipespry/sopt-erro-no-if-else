<?php

    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);

    $conn = mysqli_connect('localhost','lsiapp','','teste')
        or die(
            'Erro ao conectar-se ao banco de dados: ['
            .mysqli_connect_error()
            .']'
        );
