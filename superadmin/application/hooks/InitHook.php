<?php
class InitHook 
{
    var $CI, $isAdminLoggedIn;

    function __construct()
    {
        $this->CI = NULL;
    }

    function setTemplateData()
    {   
        if($this->CI)
        {
            // 🔥 TEMP: disable login
            // $this->authenticateAdminUser();

            $this->CI->footer_data['copyright'] =
                '<a href="https://www.intelgc.com/" target="_blank">INTELGC Solutions Pvt. Ltd.</a>';

            if(!$this->isAdminLoggedIn()){
                $this->CI->template->set_template('single');
            }else{
                $this->CI->template->set_template('main');
            }	
        }	
    }
}