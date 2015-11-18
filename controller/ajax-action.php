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
      get_order_by_id();
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
      echo '{"result":1,"product":[';	//start of json object
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
        echo '{"result":0,"message": "product not got."}';
      }
  }


?>
