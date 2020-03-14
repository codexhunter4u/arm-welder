<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      Mohan Jadhav
 * @copyright   Copyright (c) 2019, codexhunter.
 * @link        http://www.talklessexpressmore.com/myProfile
 * @license     
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Mohan Labs core CodeIgniter class
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Anil Labs 
 * @author      Mohan Jadahv
 * @link        http://www.talklessexpressmore.com/myProfile
 */

class setgetvalues {
    

    public $firstField;
    public $secondField;
    private $setData;
    private $CI;


    public function __construct($params = array())
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
        
    }


    public function __get($request) {

        if (property_exists($this, $request)) {
          return $this->$request;
        }
    }

    public function __set($request, $value) {
        
        if (property_exists($this, $request)) {
          $this->$request = $value;
        }

        return $this;
    }
    

    public function setter($request){

        $this->setData = $request;
     
    }

    public function getter($request=null){

        return $this->setData;
     
    }

}