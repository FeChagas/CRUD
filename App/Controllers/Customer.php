<?php

use App\Core\BaseController;

class Customer extends BaseController
{
  /**
  * chama a view base do controlador
  */
  public function index()
  {
    $Customers = $this->model('Customers'); // é retornado o model Customers()
    $data = $Customers::findAll();
    $this->view('customer/index', ['customers' => $data]);
  }

  /**
  * recebe e exibe o a entrada do customer.
  * @param  int   $id   Chave primaria.
  */
  public function show($id = null)
  {
    if (is_numeric($id)) 
    {
      $Customers = $this->model('Customers');
      $data = $Customers::find($id);

      if(count($data) > 0)
      {
        $this->view('customer/show', ['customer' => $data]);
      }
      else 
      {
        $this->pageNotFound();
      }
    } 
    else 
    {
      $this->pageNotFound();
    }
  }

  /**
  * recebe e exibe o a entrada do customer.
  * @param  int   $id   Chave primaria.
  */
  public function form($id = null)
  {
    $Customers = $this->model('Customers');

    if (count($_POST) > 0) 
    {
      if (isset($_POST['name']) && isset($_POST['email'])) 
      {
        $params = [];
        $params['name'] = $_POST['name'];
        $params['email'] = $_POST['email'];

        if (!isset($_POST['phone'])) 
        {
          $params['phone'] = null;
        }
        else
        {
          $params['phone'] = $_POST['phone'];
        }

        if (isset($_POST['id'])) 
        {
          $params['id'] = $_POST['id'];  
          $Customers::update($params);
          $data = $Customers::find($params['id']);

          if (count($data) > 0) 
          {
            $this->write_log('Customer with ID {id} successfuly UPDATED', $data[0], 'info');
            $this->view('components/alert', ['class' => 'primary', 'message' => 'Customer successfuly UPDATED, <a href="/customer/show/'.$data[0]['id'].'"> click here to VIEW her/him.</a>']);        
          }
          else
          {
            $this->write_log('Failed to UPDATE customer', $_POST, 'warning');
            $this->view('components/alert', ['class' => 'warning', 'message' => 'Something went wrong, check the fields and try again! Don\'t give up :)']);        
          }
        }
        else if (isset($_POST['document'])) 
        {
          $params['document'] = $_POST['document'];

          $data = $Customers::findByDocument($params['document']);
          if (count($data) > 0 && !isset($_POST['id'])) 
          {
            $this->write_log('Trying to CREATE customer with a exiting document {document}', $_POST, 'info');
            $this->view('components/alert', ['class' => 'info', 'message' => 'Hold up, looks like this customer already exists, <a href="/customer/show/'.$data[0]['id'].'"> click here to VIEW her/him.</a>']);        
          }
          else
          {
            $Customers::new($params);
            $data = $Customers::findByDocument($params['document']);

            if (count($data) > 0) 
            {
              $this->write_log('NEW customer {name}, document {document} CREATED with ID {id}', $data[0], 'info');
              $this->view('components/alert', ['class' => 'primary', 'message' => 'Customer successfuly CREATED, <a href="/customer/show/'.$data[0]['id'].'"> click here to VIEW her/him.</a>']);        
            }
            else
            {
              $this->write_log('Failed to CREATE customer', $_POST, 'warning');
              $this->view('components/alert', ['class' => 'warning', 'message' => 'Something went wrong, check the fields and try again! Don\'t give up :)']);        
            }
          }
        }
      }
    }

    if (is_numeric($id)) 
    {
      $data = $Customers::find($id);
      $this->view('customer/form', ['customer' => $data[0]]);
    } 
    elseif (null === $id) 
    {
      $this->view('customer/form', []);
    } 
    else {
      $this->pageNotFound();
    }
  }

  /**
  * Apaga um customer pelo ID.
  * @param  int   $id   Chave primaria.
  */
  public function delete($id = null)
  {
    if (is_numeric($id)) 
    {
      $Customers = $this->model('Customers');
      $old = $Customers::find($id);

      if (count($old) > 0) 
      {
        $data = $Customers::delete($id);        

        $data = $Customers::findAll();

        $old_still_exists = $Customers::find($id);

        if (count($old_still_exists) > 0) 
        {
          $this->write_log('Failed to DELETE customer {id}', $old, 'warning');
          $this->view('components/alert', ['class' => 'primary', 'message' => 'Failed to DELETE customer, let\'s try again.']);
          $this->view('customer/index', ['customers' => $data]);       
        }
        else
        {
          $this->write_log('Customer with ID {$id} was DELETED', $old, 'info');
          $this->view('components/alert', ['class' => 'primary', 'message' => 'Customer successfuly DELETED, it\'s a good bye :(']);
          $this->view('customer/index', ['customers' => $data]);        
        }
      }
      else
      {
        $this->write_log('Trying to DELETE customer with ID {id}, but it don\'t exist', ['id' => $id], 'info');
        $this->view('components/alert', ['class' => 'warning', 'message' => 'This customer don\'t exist.']);
      }
    } 
    else 
    {
      $this->pageNotFound();
    }
  }

  private function pageNoteFound()
  {
    $this->view('error404.php',[]);
  }


}