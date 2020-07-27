<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Customers extends Database
{
  private $id;

  private $name;

  private $email;

  private $document;

  private $phone;  

  public function __construct() 
  {
    $class = get_class($this);
    $exp = explode('\\', $class);
    $tbl_name = end($exp);
    $query = 'CREATE TABLE IF NOT EXISTS '.strtolower($tbl_name).' (`id` int NOT NULL AUTO_INCREMENT';
    $props = get_object_vars($this);
    foreach ($props as $prop => $value) 
    {
      ($prop !== 'id') ? $query .= ', `'.$prop.'` varchar(250)' : '';      
    }
    $query .=", PRIMARY KEY (id))";

    parent::__construct($query);
  }

  /**
  * Este método busca todos os clientes armazenados na base de dados
  *
  * @return   array
  */
  public static function findAll()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM customers');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Este método busca um cliente armazenados na base de dados com um
  * determinado ID
  * @param    int     $id   Identificador único do cliente
  *
  * @return   array
  */
  public static function find(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM customers WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Este método busca um cliente armazenado na base de dados com um
  * determinado Documento
  * @param    string     $document   Documento do cliente
  *
  * @return   array
  */
  public static function findByDocument(string $document)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM customers WHERE document = :DOCUMENT LIMIT 1', array(
      ':DOCUMENT' => $document
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Esse metodo cria um cliente na base de dados
  * @param    int     $id   Identificador único do cliente
  *
  * @return   array
  */
  public static function new(array $params)
  {
    $conn = new Database();
    $result = $conn->executeQuery('INSERT INTO customers (name, document, email, phone) VALUES(:NAME, :DOCUMENT, :EMAIL, :PHONE) ON DUPLICATE KEY UPDATE document=:DOCUMENT', array(
      ':NAME' => $params['name'],
      ':DOCUMENT' => $params['document'],
      ':EMAIL' => $params['email'],
      ':PHONE' => $params['phone'],

    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Esse metodo atualiza um cliente baseado em
  * determinado ID
  * @param    int     $id   Identificador único do cliente
  *
  * @return   array
  */
  public static function update(array $params)
  {
    $conn = new Database();
    $result = $conn->executeQuery('UPDATE customers SET name=:NAME, email=:EMAIL, phone=:PHONE WHERE  id=:ID;', array(
      ':ID' => $params['id'],
      ':NAME' => $params['name'],
      ':EMAIL' => $params['email'],
      ':PHONE' => $params['phone'],

    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Este método apaga um cliente da base de dados com um
  * determinado ID
  * @param    int     $id   Identificador único do cliente
  *
  * @return   array
  */
  public static function delete(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('DELETE FROM customers WHERE  id=:ID;', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}