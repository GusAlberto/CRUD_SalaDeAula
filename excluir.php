<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Sala;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: public/index.php?status=error');
  exit;
}

//CONSULTA A SALA
$obSala = Sala::getSala($_GET['id']);

//VALIDAÇÃO DA SALA
if(!$obSala instanceof Sala){
  header('location: public/index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obSala->excluir();

  header('location: public/index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';