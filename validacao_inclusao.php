<?php
session_start();
include 'conexao.php';
$nome=$_POST['nome'];#pega o valor de nome
$preco=$_POST['preco'];#pega o valor de preco
$quantidade=$_POST['quantidade'];#pega o valor da quantidade

#verifica se os parametro passados pelo $_POST são diferentes de true, ou seja se estão vazios, se sim, redireciona
if(empty($nome)){
        $_SESSION['erroCampoNome'] = "Campo nome obrigatorio";
        header("Location: incluir.php");
    }

    //Verificar a existencia da variavel $_POST['nome']
    if(isset($_POST['nome'])){
        if(!empty($_POST['nome'])){
          $nome=$_POST['nome'];
          $preco=$_POST['preco'];
          $qntd_estoque=$_POST['quantidade'];
          $cod=$_SESSION['cod'];
          $sql = "INSERT INTO estoque_produtos (nome, quantidade, vezes_comprado, preco, fk_dono_estoque_cod) VALUES ('$nome','$qntd_estoque','0','$preco','$cod')";
          $query=mysqli_query($conexao, $sql);
          header("Location: dashboard.php");
          $conexao->close();
          echo "<pre>";
          print_r($_SESSION);
          echo "</pre>";
        }
    }






?>
