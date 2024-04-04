<?php

$login = $_POST["login"];
$senha = MD5($_POST["senha"]);
$connect = mysql_connect("nome_do_servidor","nome_de_usuario","senha");
$db = mysql_select_db("nome_do_banco_de_dados");
$query_select = "SELECT login FROM usuarios WHERE login = "$login"";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array["login"];

  if($login == "" || $login == null){
    echo"<script language="javascript" type="text/javascript">
    alert("O campo login deve ser preenchido");window.location.href="
    cadastro.html";</script>";

    }else{
      if($logarray == $login){

        echo"<script language="javascript" type="text/javascript">
        alert("Esse login já existe");window.location.href="
        cadastro.html";</script>";
        die();

      }else{
        $query = "INSERT INTO usuarios (login,senha) VALUES ("$login","$senha")";
        $insert = mysql_query($query,$connect);

        if($insert){
          echo"<script language="javascript" type="text/javascript">
          alert("Usuário cadastrado com sucesso!");window.location.
          href="login.html"</script>";
        }else{
          echo"<script language="javascript" type="text/javascript">
          alert("Não foi possível cadastrar esse usuário");window.location
          .href="cadastro.html"</script>";
        }
      }
    }
?>

<?php
$login = $_POST["login"];
$entrar = $_POST["entrar"];
$senha = md5($_POST["senha"]);
$connect = mysql_connect("nome_do_servidor","nome_de_usuario","senha");
$db = mysql_select_db("nome_do_banco_de_dados");
  if (isset($entrar)) {

    $verifica = mysql_query("SELECT * FROM usuarios WHERE login =
    "$login" AND senha = "$senha"") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language="javascript" type="text/javascript">
        alert("Login e/ou senha incorretos");window.location
        .href="login.html";</script>";
        die();
      }else{
        setcookie("login",$login);
        header("Location:index.php");
      }
  }
?>

<?php
  $login_cookie = $_COOKIE["login"];
    if(isset($login_cookie)){
      echo"Bem-Vindo, $login_cookie <br>";
      echo"Essas informações <font color="red">PODEM</font> ser acessadas por você";
    }else{
      echo"Bem-Vindo, convidado <br>";
      echo"Essas informações <font color="red">NÃO PODEM</font> ser acessadas por você";
      echo"<br><a href="login.html">Faça Login</a> Para ler o conteúdo";
    }
?>