<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Globals {

    public static $table;
    public static $column_order = [];
    public static $column_search = [];
    public static $column_where = [];
    public static $order = [];
 
    public static function _get_datatables_query()
    {
        $CI = &get_instance();
        $CI->db->from(self::$table);
 
        $i = 0;
     
        foreach (self::$column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $CI->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $CI->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $CI->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count(self::$column_search) - 1 == $i) //last loop
                    $CI->db->group_end(); //close bracket
            }
            $i++;
        }
        
        foreach (self::$column_where as $key => $item) // where equal to query builder
        {
            $CI->db->where($key, $item);
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $CI->db->order_by(self::$column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else if(!empty(self::$order)){
            $order = self::$order;
            $CI->db->order_by(key($order), $order[key($order)]);
        }
        
    }
 
    public static function count_filtered()
    {
        $CI = &get_instance();
        self::_get_datatables_query();
        $query = $CI->db->get();
        return $query->num_rows();
    }
 
    public static function count_all()
    {
        $CI = &get_instance();
        $CI->db->from(self::$table);
        return $CI->db->count_all_results();
    }
    
}
