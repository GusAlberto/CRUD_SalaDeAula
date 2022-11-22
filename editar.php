<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar sala');

use \App\Entity\Sala;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A SALA
$obSala = Sala::getSala($_GET['id']);

//VALIDAÇÃO DA SALA
if(!$obSala instanceof Sala) {
  header('location: public/index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset(
  $_POST['titulo'],
  $_POST['descricao'],
  $_POST['ativo']
  ))

{
  $obSala->titulo    = $_POST['titulo'];
  $obSala->descricao = $_POST['descricao'];
  $obSala->ativo     = $_POST['ativo'];
  $obSala->atualizar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';