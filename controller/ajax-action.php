<?php

/**
 * author: Michael Annor
 * date: 15th November, 2015
 * description: ajax-action page, interfaces with android applica
 */

  $cmd = $_REQUEST['cmd'];
  switch ($cmd) {
    case 1:
      cmd_get_all_orders();
      break;

    case 2:
      cmd_get_order_by_id();
      break;

    case 3:
      cmd_set_order_ready();
      break;

    case 4:
      cmd_set_order_discharged();
      break;

    case 5:
      cmd_get_all_meals();
      break;

    case 6:
      cmd_get_meal_by_id();
      break;

    case 7:
      cmd_set_meal_available();
      break;

    case 8:
      cmd_set_meal_unavailable();
      break;

    default:
      # code...
      break;
  }


  /**
   * [[The cmd_get_all_orders function is to get all outstanding orders from the database]]
   */
  public function cmd_get_all_orders(){
    $cafeteria_id = $_REQUEST['cafeteria'];
    include ("order.php");
    $obj = new order();
    $row = $obj->get_all_orders($cafeteria_id);
    if ($row){
      //return a JSON string to browser when request comes to get description
      //generate the JSON message to echo to the browser
      echo '{"result":1,"orders":[';	//start of json object
        while($row){
          echo json_encode($row);			//convert the result array to json object
          $row=$obj->fetch();
          if ($row){
            echo ",";
          }
        }
        echo "]}";							//end of json array and object
      }
      else{
        echo '{"result":0,"message": "orders not got."}';
      }
  }

  /**
   * [[The cmd_get_order_by_id function is to get a specific outstanding order from the database]]
   */
   public function cmd_get_order_by_id(){
     $order_id = $_REQUEST['order'];
     include ("order.php");
     $obj = new order();

     $row = $obj->get_order_by_id($order_id);
     //return a JSON string to browser when request comes to get description

     if($row){
         //generate the JSON message to echo to the browser
         echo '{"result":1,"order":[';	//start of json object
           echo json_encode($row);			//convert the result array to json object
           echo "]}";							//end of json array and object
      }
       else{
         echo '{"result":0,"message": "order not retrieved."}';
       }
   }

   /**
    * [[The cmd_set_order_ready function is to update the status of an order when ready]]
    */
   public function cmd_set_order_ready(){
     $order_id = $_REQUEST['order'];
     include ("order.php");
     $obj = new order();

     if($obj->set_order_ready($order_id)){
       echo '{"result":1,"message": "Success setting updating status to ready"}';
     }
     else{
       echo '{"result":0,"message": "Failed to update status to ready."}';
     }
   }

   /**
    * [[The cmd_set_order_discharged function is to update the status of an order when discharged]]
    */
   public function cmd_set_order_discharged(){
     $order_id = $_REQUEST['order'];
     include ("order.php");
     $obj = new order();

     if($obj->set_order_discharged($order_id)){
       echo '{"result":1,"message": "Success updating status to discharged"}';
     }
     else{
       echo '{"result":0,"message": "Failed to update status to discharged."}';
     }
   }


   /**
    * [[The cmd_get_all_meals function is to get all meals from the database]]
    */
   public function cmd_get_all_meals(){
     $cafeteria_id = $_REQUEST['cafeteria'];
     include ("meal.php");
     $obj = new meal();
     $row = $obj->get_all_meals($cafeteria_id);
     if ($row){
       //return a JSON string to browser when request comes to get description
       //generate the JSON message to echo to the browser
       echo '{"result":1,"meals":[';	//start of json object
         while($row){
           echo json_encode($row);			//convert the result array to json object
           $row=$obj->fetch();
           if ($row){
             echo ",";
           }
         }
         echo "]}";							//end of json array and object
       }
       else{
         echo '{"result":0,"message": "meals not got."}';
       }
   }

   /**
    * [[The cmd_get_meal_by_id function is to get a specific meal from the database]]
    */
    public function cmd_get_meal_by_id(){
      $meal_id = $_REQUEST['meal'];
      include ("meal.php");
      $obj = new meal();

      $row = $obj->get_meal_by_id($meal_id);
      //return a JSON string to browser when request comes to get description

      if($row){
          //generate the JSON message to echo to the browser
          echo '{"result":1,"meal":[';	//start of json object
            echo json_encode($row);			//convert the result array to json object
            echo "]}";							//end of json array and object
       }
        else{
          echo '{"result":0,"message": "meal not retrieved."}';
        }
    }

    /**
     * [[The cmd_set_meal_available function is to update the availability to available]]
     */
    public function cmd_set_meal_available(){
      $meal_id = $_REQUEST['meal'];
      include ("meal.php");
      $obj = new meal();

      if($obj->set_meal_available($meal_id)){
        echo '{"result":1,"message": "Success updating availability to available"}';
      }
      else{
        echo '{"result":0,"message": "Failed to update availability to available."}';
      }
    }

    /**
     * [[The cmd_set_meal_unavailable function is to update the availability to unavailable]]
     */
    public function cmd_set_meal_unavailable(){
      $meal_id = $_REQUEST['meal'];
      include ("meal.php");
      $obj = new meal();

      if($obj->set_meal_unavailable($meal_id)){
        echo '{"result":1,"message": "Success updating availability to unavailable"}';
      }
      else{
        echo '{"result":0,"message": "Failed to update availability to unavailable."}';
      }
    }

?>
