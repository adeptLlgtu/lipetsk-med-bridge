<?php 
namespace SDFramework\Controllers;
use SDFramework\Controller;
use \SDFramework\Database;
use SDFramework\Environment;
use SDFramework\ExceptionHandler;
class DefaultController
{
   public static function welcome()
   {
    return '
    <head>
    <link type="text/css" rel="stylesheet" href="/style.css">
    <div class="wrapper"></div>';
   }
   public static function get_request($field, $table, $id)
   {
      $db = (new Database())->ORM;
      $f = $field;
      if($field == "all") $f = '*';
      if($id=="all"){
         $data = $db->getAll('SELECT '.$f.' FROM '.$table);
      }
      else{
         $data = $db->getAll('SELECT '.$f.' FROM '.$table.' WHERE id='.$id);
      }
      return json_encode($data);
   }
   public static function registration()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      // Указываем, что будем работать с таблицей users
      $users = $db->dispense('users');
      // Заполняем объект свойствами
      $users->login = $data['login'];
      $users->password = $data['password'];
      $users->roots = 1;
      // Сохраняем объект
      $db->store($users);
      return json_encode($data);
   }
   public static function orders()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      // Указываем, что будем работать с таблицей users
      $orders = $db->dispense('orders');
      // Заполняем объект свойствами
      $orders->meds_name = $data['meds_name'];
      $orders->meds_many = $data['meds_many'];
      $orders->status = false;
      // Сохраняем объект
      $db->store($orders);
      return json_encode($data);
   }
   public static function iterate()
    {
       $db = (new Database())->ORM;
             $data = $_POST;
             $id = $data['id'];
             $meds = $db->load('meds', $id);
             // Обращаемся к свойству объекта и назначаем ему новое значение
             $meds->meds_many = $data['meds_many'];
             // Сохраняем объект
             $db->store($meds);

             return json_encode($data);
    }
    public static function newMeds()
        {
           $db = (new Database())->ORM;
                 $data = $_POST;
                 $meds = $db->dispense('meds');
                 // Обращаемся к свойству объекта и назначаем ему новое значение
                 $meds->meds_name = $data['meds_name'];
                 $meds->meds_many = $data['meds_many'];
                 $meds->meds_contraindications = $data['meds_contraindications'];
                 $meds->side_effects = $data['side_effects'];
                 $meds->meds_form = $data['meds_form'];
                 $meds->meds_structure = $data['meds_structure'];
                 $meds->meds_instruction = $data['meds_instruction'];
                 $meds->price = $data['price'];
                 // Сохраняем объект
                 $db->store($meds);
                 return json_encode($data);
        }

     public static function deleteMeds()
       {
          $db = (new Database())->ORM;
          $data = $_POST;

          $id = $data['id'];
          $meds = $db->load('meds', $id);
          $db->trash($meds);

          return json_encode($data);
       }
}
?>