<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar sala');

use \App\Entity\Sala;
$obSala = new Sala;

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){

  $obSala->titulo    = $_POST['titulo'];
  $obSala->descricao = $_POST['descricao'];
  $obSala->ativo     = $_POST['ativo'];
  $obSala->cadastrar();

  header('location: public/index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';