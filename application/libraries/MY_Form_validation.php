<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {
    // --------------------------------------------------------------------

    /**
     * Valid Date (ISO format)
     *
     * @access      public
     * @param       string
     * @return      bool
     */
    function valid_date($str) {
        if (preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})/", $str, $matches)) {
            $yyyy = $matches[1];            // first element of the array is year
            $mm = $matches[2];              // second element is month
            $dd = $matches[3];              // third element is days
            return ( checkdate($mm, $dd, $yyyy) );
        }

        return FALSE;
    }

    public function decimal($str) {
        return (bool) preg_match('/^[\-+]?[0-9]+(\.[0-9]+)?$/', $str);
    }

    function alpha_dash_space($str) {
        return (!preg_match("/^([[:alnum:]-_ ])+$/ui", $str)) ? FALSE : TRUE;
    }

    function alpha_numeric_interpunction($str) {
        return (!preg_match("/^[[:alnum:]-_\/\[\]()%:;,. ]+$/ui", $str)) ? FALSE : TRUE;
    }

    function is_money($str) {
        return (!preg_match('/^[+-]{0,1}[0-9]+(?:,[0-9]{0,2})?$/', $str)) ? FALSE : TRUE;
    }

    function signed_integer($str) {
        return (!preg_match("/^[+-]{0,1}[0-9]+$/", $str)) ? FALSE : TRUE;
    }

    function trim($str) {
        return preg_replace("/(^\s+)|(\s+$)/us", "", $str);
    }

    function enum($str, $enum_values) {
        if (empty($str)) {
            return false;
        }

        $enum_values = array_map('trim', explode(',', $enum_values));
        return in_array($str, $enum_values);
    }

    function set_error($field, $message) {
        $this->_error_array[$field] = $message;
    }

}
