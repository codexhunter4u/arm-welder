<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ImgHelper {

    static $result = array();

    // Add text watermark to image
    static function addImageWatermark($config) {

        $CI = &get_instance();
        $imgConfig = array();
        $imgConfig['image_library'] = 'GD2';
        $imgConfig['source_image']  = $config['filepath'];
        $imgConfig['new_image']     = $config['filepath'];
        $imgConfig['wm_text']       = $config['text'];
        $imgConfig['wm_type']       = 'text';
        $imgConfig['wm_font_size']  = $config['fontsize'];
    
        $CI->load->library('image_lib', $imgConfig);
        $CI->image_lib->initialize($imgConfig);

        if (!$this->image_lib->watermark()){
            return self::$result = array('status' => FALSE ,
             'Erorr' => $this->image_lib->display_errors());  
        }else {
            return self::$result = array('status' => TRUE);
        }
    }

    //Resize Image code
    static function resizeImage($config) {

        $CI = &get_instance();
        $imgConfig = array();
        $imgConfig['image_library']    = 'gd2';
        $imgConfig['source_image']     = $config['filepath'];
        $imgConfig['create_thumb']     = FALSE;
        $imgConfig['maintain_ratio']   = FALSE;
        $imgConfig['quality']          = $config['quality'];
        $imgConfig['new_image']        = $config['filepath'];
        $imgConfig['width']            = $config['width'];
        $imgConfig['height']           = $config['height'];        
        $CI->load->library('image_lib', $imgConfig);

        if (!$CI->image_lib->resize()){
            return self::$result = array('status' => FALSE ,
             'Erorr' => $CI->image_lib->display_errors());  
        }else {
            return self::$result = array('status' => TRUE);
        }
    }

    // Crop Images
    static function cropImage($config) {

        $CI = &get_instance();
        $imgConfig = array();
        $imgConfig['image_library'] = 'gd2';
        $imgConfig['source_image']  = $config['filepath'];
        $imgConfig['new_image']     = $config['filepath'];
        $imgConfig['height']        = $config['height'];
        $imgConfig['width']         = $config['width'];
        $imgConfig['x_axis']        = $config['x_axis'];
        $imgConfig['y_axis']        = $config['y_axis'];
        $CI->load->library('image_lib', $imgConfig);
        $CI->image_lib->initialize($imgConfig); 
 
        if (!$CI->image_lib->crop()){
            return self::$result = array('status' => FALSE ,
             'Erorr' => $CI->image_lib->display_errors());  
        }else {
            return self::$result = array('status' => TRUE);
        }
    }

    // Rotate image
    static function rotateImage($config){
        
        $CI = &get_instance();
        $imgConfig = array();
        $imgConfig['image_library']  = 'gd2';
        $imgConfig['source_image']   = $config['filepath'];
        $imgConfig['new_image']      = $config['filepath'];
        $imgConfig['height']         = $config['height'];
        $imgConfig['width']          = $config['width'];
        $imgConfig['rotation_angle'] = $config['rotation_angle'];
        $CI->load->library('image_lib', $imgConfig);
        $CI->image_lib->initialize($imgConfig);

        if (!$this->image_lib->rotate()){
            return self::$result = array('status' => FALSE ,
             'Erorr' => $this->image_lib->display_errors());  
        }else {
            return self::$result = array('status' => TRUE);
        }
    }

    //Overlay watermark image
    static function addOverlayImage($config) {

        $CI = &get_instance();
        $imgConfig = array();
        $imgConfig['image_library']     = 'GD2';
        $imgConfig['source_image']      = $config['filepath'];
        $imgConfig['wm_overlay_path']   = $config['overlayimgpath'];
        $imgConfig['wm_type']           = 'overlay';
        $this->load->library('image_lib', $imgConfig);
        $this->image_lib->initialize($imgConfig);

        if (!$CI->image_lib->watermark()){
            return self::$result = array('status' => FALSE ,
             'Erorr' => $CI->image_lib->display_errors());  
        }else {
            return self::$result = array('status' => TRUE);
        }
    }
}
