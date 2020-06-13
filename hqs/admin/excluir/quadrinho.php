<?php
  //verificar se não está logado
  if ( !isset ( $_SESSION["hqs"]["id"] ) ){
    exit;
  }

  //verificar se o id esta vazio
  if ( empty ( $id ) ) {
  	echo "<script>alert('Não foi possível excluir o registro');history.back();</script>";
  	exit;
  }

 
  //excluir o quadrinho
  $sql = "delete from quadrinho where id = ? limit 1";
  $consulta = $pdo->prepare($sql);
  $consulta->bindParam(1, $id);
  //verificar se não executou
  if ( !$consulta->execute() ) {

  	//capturar os erros e mostra a mensagem na tela
  	echo $consulta->errorInfo()[2];

  	echo "<script>alert('Erro ao excluir');history.back();</script>";
  	exit;
  }

  echo "<script>alert('Quadrinho deletado com sucesso!');history.back();</script>";

  //redirecionar para a listagem de editoras
  echo "<script>location.href='listar/quadrinho';</script>";
