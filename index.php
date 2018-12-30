<?php
    // Para ambiente de teste:
    $btnCadUsuario = true;

    if ($btnCadUsuario) {
        require_once('conexao.php');
        // Para ambiente de teste:
        $dados = array(
            'nome' => 'LipESprY 2',
            'email' => 'teste2@email.com.br',
            'password' => 'lipe123',
            'password2' => 'lipe123'
        );
        //$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //var_dump($dados);

        $dados['password'] = password_hash(
            $dados['password'],
            PASSWORD_DEFAULT
        );

        $pegaEmail = mysqli_query(
            $conn,
            "SELECT * FROM members WHERE member_email = '"
            .$dados['email']
            ."';"
        ) or die(mysqli_error($conn));

        if (mysqli_num_rows($pegaEmail) > 0) {
            die(
                "Ja existe um usuario cadastrado com o email: "
                .$dados['email']
            );
        }
        //FIM DO NOVO BLOCO

        $result_usuario = "INSERT INTO members
            (member_name, member_password, member_email)
            VALUES (
                '" .$dados['nome']. "',
                '" .$dados['password']. "',
                '" .$dados['email']. "'
            )";

        $resultado_usario = mysqli_query($conn, $result_usuario);

        if (mysqli_insert_id($conn)) {
            $_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
            //header("Location: login.php");
            die("Usuário cadastrado com sucesso");
        } else {
            $_SESSION['msg'] = "Erro ao cadastrar o usuário";
            // Mostra o erro caso não consiga add o usuário
            die('Erro ao cadastrar o usuário: '.mysqli_error($conn));
        }

    } else  // Para ambiente de teste:
        echo '$btnCadUsuario nulo ou falso!';
