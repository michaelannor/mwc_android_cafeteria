<?php

/**
 * author: Michael Annor
 * date: 18th November, 2015
 * description: class containing database queries on the mwc_android_orders table
 */

include("adb.php");

class order extends adb{

  /**
   * [[The get_all_orders is a function to fetch all the orders to a particular cafeteria from the database]]
   * @param [[Int]] $cafeteria [[The cafeteria id]]
   */
    function get_all_orders($cafeteria){
        $str_query="select * from mwc_android_orders, mwc_android_meals where cafeteria_id='$cafeteria' and status <> 'DISCHARGED'";
        if(!$this->query($str_query)){
            return false;
        }
        return $this->fetch();
    }

  /**
   * [[The get_order_by_id is a function to fetch details of a specific order from the database by id]]
   * @param [[Int]] $id [[Order id]]
   */
    function get_order_by_id($id){
        $str_query="select * from mwc_android_orders where order_id='$id'";
        if(!$this->query($str_query)){
            return false;
        }
        return $this->fetch();
    }

    /**
     * [[The set_order_ready is a function to set the status of an order to ready]]
     * @param [[Int]] $id [[Odrer id]]
     */
      function set_order_ready($id){
          $str_query="update mwc_android_orders set status='READY' where order_id='$id'";
          return $this->query($str_query);
      }

      /**
       * [[The set_order_discharged is a function to set the status of an order to discharged]]
       * @param [[Int]] $id [[Odrer id]]
       */
        function set_order_discharged($id){
            $str_query="update mwc_android_orders set status='DISCHARGED' where order_id='$id'";
            return $this->query($str_query);
        }

}
?>
