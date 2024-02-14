<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require dirname(__FILE__,3).'\assets\classes\UserClass.php';
    require dirname(__FILE__,3).'\assets\sql\connection.php';

    $u = new UserClass();
    
    $login = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    var_dump($senha);

    $senha = hash('sha256',$senha);
    $id_session = 0;
    $hash = 0;

    $v = $u->validarLogin($login, $senha, 'admin_users');


    session_start();
    
    if($v[0] == true){
        $id_session = rand(0,9999);

        $hash = hash('sha256',$login.$senha.$id_session);
        
        $_SESSION['id_usuario'] = $v[1];
        $_SESSION['id_session'] = $id_session;
        $_SESSION['hash'] = $hash;
        var_dump($_SESSION);


        // ATUALIZA O ID DA SESSÃO ATUAL DIRETAMENTE NO BANCO DE DADOS
        $pdo = setPDO('base');
        $sql = "UPDATE admin_users SET id_session=:id_session WHERE id_usuario = :id_usuario";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id_session',$id_session);
        $sql->bindValue(':id_usuario',$_SESSION['id_usuario']);
        $sql->execute();

    }else{
        setcookie('popup-'.($_SESSION['popupCount'] + 1).'-red', 'usuário ou senha inválidos.', time()+2,'/');
    }


    header('location: http://localhost/admin');

    

}


?>