<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    function model($model, $name = '', $db_conn = FALSE)  {
        if (is_array($model)) {
            foreach ($model as $file => $object_name) {
                // Linear array was passed, be backwards compatible.
                // CI already allows loading models as arrays, but does
                // not accept the model name param, just the file name
                if ( ! is_string($file)) {
                    $file = $object_name;
                    $object_name = NULL;
                }
                parent::model($file, $object_name);
            }
            return;
        }

        // Call the default method otherwise
        parent::model($model, $name, $db_conn);
    }
}