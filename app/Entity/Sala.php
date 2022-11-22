<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Sala
{

  /**
   * Identificador único da sala
   * @var integer
   */
  public $id;

  /**
   * Título da sala
   * @var string
   */
  public $titulo;

  /**
   * Descrição da sala (pode conter html)
   * @var string
   */
  public $descricao;

  /**
   * Define se a sala ativa
   * @var string(s/n)
   */
  public $ativo;

  /**
   * Data de publicação da sala
   * @var string
   */
  public $data;

  /**
   * Método responsável por cadastrar uma nova sala no banco
   * @return boolean
   */
  public function cadastrar()
  {
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A SALA NO BANCO
    $obDatabase = new Database('salas');
    $this->id = $obDatabase
      ->insert([
        'titulo'    => $this->titulo,
        'descricao' => $this->descricao,
        'ativo'     => $this->ativo,
        'data'      => $this->data
      ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a sala no banco
   * @return boolean
   */
  public function atualizar() 
  {
    return (new Database('salas'))
    ->update('id = '.$this->id,
    [
      'titulo'    => $this->titulo,
      'descricao' => $this->descricao,
      'ativo'     => $this->ativo,
      'data'      => $this->data
    ]);
  }

  /**
   * Método responsável por excluir a sala do banco
   * @return boolean
   */
  public function excluir()
  {
    return (new Database('salas'))
      ->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as salas do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getSalas($where = null, $order = null, $limit = null)
  {
    return (new Database('salas'))
      ->select($where,$order,$limit)
      ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma sala com base em seu ID
   * @param  integer $id
   * @return Sala
   */
  public static function getSala($id)
  {
    return (new Database('salas'))
      ->select('id = '.$id)
      ->fetchObject(self::class);
  }

}