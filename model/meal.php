<?php

/**
 * author: Michael Annor
 * date: 18th November, 2015
 * description: class containing database queries on the mwc_android_meals table
 */

include("adb.php");

class meal extends adb{

  /**
   * [[The get_all_meals is a function to fetch all the meals by a particular cafeteria from the database]]
   * @param [[Int]] $cafeteria [[The cafeteria id]]
   */
    function get_all_meals($cafeteria){
        $str_query="select * from mwc_android_meals where cafeteria_id='$cafeteria'";
        if(!$this->query($str_query)){
            return false;
        }
        return $this->fetch();
    }

  /**
   * [[The get_meal_by_id is a function to fetch details of a specific meal from the database by id]]
   * @param [[Int]] $id [[Meal id]]
   */
    function get_meal_by_id($id){
        $str_query="select * from mwc_android_meals where meal_id='$id'";
        if(!$this->query($str_query)){
            return false;
        }
        return $this->fetch();
    }

    /**
     * [[The set_meal_available is a function to set the availability of a meal to available]]
     * @param [[Int]] $id [[Meal id]]
     */
      function set_meal_available($id){
          $str_query="update mwc_android_meals set meal_availability=1 where meal_id='$id'";
          return $this->query($str_query);
      }

      /**
       * [[The set_meal_unavailable is a function to set the availability of a meal to unavailable]]
       * @param [[Int]] $id [[Meal id]]
       */
        function set_meal_unavailable($id){
            $str_query="update mwc_android_meals set meal_availability=0 where meal_id='$id'";
            return $this->query($str_query);
        }

}
?>
