<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function flashmsg($string, $flag = 'info') {
	$CI =& get_instance();
	$CI->session->set_userdata('monolog', $string);
	$CI->session->set_userdata('monolog_flag', $flag);
}

function showflashmsg() {
	$CI =& get_instance();
	$monolog = $CI->session->userdata('monolog');
	$monolog_flag = $CI->session->userdata('monolog_flag');
	
	if (empty($monolog)) return;
	
	?>
	<div id="monolog" class="alert alert-<?=$monolog_flag?>" style="margin-top:15px;">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<?=$monolog?>
	</div>
	<?php
	$monolog = $CI->session->unset_userdata('monolog');
}

function checkpath($path) {
	if (!is_dir($path)) {
	    mkdir($path, 0777, true);
	}
	return $path;
}

function _uuid($text) {
    return strtoupper(str_replace('_', '-', $text));
} 

function gen_uuid() {
    return strtoupper(sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    ));
}

function slugify($text) { 
  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
  // trim
  $text = trim($text, '-');
  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  // lowercase
  $text = strtolower($text);
  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);
  if (empty($text)) return 'n-a';
  return $text;
}

function is_assoc($array) {
  return (key($array) === 0) ? true : false;
}

function as_money($input, $cents = true) {
    return ($cents) ? '$'.number_format($input/100, 2) : '$'.number_format($input, 2);
}
function as_money_nodec($input, $cents = true) {
    return ($cents) ? '$'.number_format($input/100) : '$'.number_format($input);
}

function to_pennies($input) {
  return (int) preg_replace("/[^0-9]/", "", $input);
}


function respond($data = array()) {
    echo json_encode($data);
    return $data;
}

function input($name, $label, $attrs = array()) {
    $defaults['class'] = 'form-control input-lg';
    $defaults['type'] = 'text';
    $defaults['placeholder'] = $label;
    $defaults['id'] = $name . 'Input';
    $defaults['value'] = null;
    $defaults['dir'] = 'ltr';
    $defaults['extra'] = '';
    if(isset($attrs['label'])) {
        $label = $attrs['label'];
    }
    $attrs = array_merge($defaults, $attrs);
    ?>
    <div id="<?=$name?>-group" class="form-group <?php if(form_error($name)) { ?>has-error<?php } ?>">
        <?php if($label) { ?><label for="<?=$attrs['id']?>"><?=$label?></label><?php } ?>
        <input type="<?=$attrs['type']?>" name="<?=$name?>" dir="<?=$attrs['dir']?>" class="<?=$attrs['class']?>" value="<?=set_value($name, $attrs['value'])?>" id="<?=$attrs['id']?>" placeholder="<?=$attrs['placeholder']?>" data-input-mask="<?=(!empty($attrs['input_mask'])) ? $attrs['input_mask'] : ''?>" data-rule-id="<?=(!empty($attrs['rule_id'])) ? $attrs['rule_id'] : ''?>" <?=$attrs['extra']?>>
        <?php if(form_error($name)) { ?><span class="help-inline error"><?=form_error($name)?></span><?php } ?>
        <?php if(!empty($attrs['help'])) { ?><span class="help-inline info"><?=$attrs['help']?></span><?php } ?>
    </div>
    <?php
}

function textarea($name, $label, $attrs = array()) {
    $defaults['class'] = 'form-control input-lg';
    $defaults['placeholder'] = $label;
    $defaults['id'] = $name . 'Input';
    $defaults['value'] = null;
    $defaults['width'] = '100%';
    $defaults['height'] = '200px';
    $defaults['style'] = '';
    if(isset($attrs['label'])) {
        $label = $attrs['label'];
    }
    $attrs = array_merge($defaults, $attrs);
    ?>
    <div id="<?=$name?>-group" class="form-group <?php if(form_error($name)) { ?>has-error<?php } ?>">
        <?php if($label) { ?><label for="<?=$attrs['id']?>"><?=$label?></label><?php } ?>
        <textarea name="<?=$name?>" class="<?=$attrs['class']?>" id="<?=$attrs['id']?>" placeholder="<?=$attrs['placeholder']?>" style="width:<?=$attrs['width']?>;height:<?=$attrs['height']?>;<?=$attrs['style']?>" data-rule-id="<?=(!empty($attrs['rule_id'])) ? $attrs['rule_id'] : ''?>"><?=set_value($name, $attrs['value'])?></textarea>
        <?php if(form_error($name)) { ?><span class="help-inline error"><?=form_error($name)?></span><?php } ?>
        <?php if(!empty($attrs['help'])) { ?><span class="help-inline info"><?=$attrs['help']?></span><?php } ?>
    </div>
    <?php
}

function dropdown($name, $label, $options, $attrs = array()) {
    $defaults['class'] = 'form-control input-lg';
    $defaults['placeholder'] = $label;
    $defaults['id'] = $name . 'Input';
    $defaults['value'] = null;
    $defaults['extra'] = '';
    if(isset($attrs['label'])) {
        $label = $attrs['label'];
    }
    $options = (!is_array($options)) ? explode(',', $options) : $options;
    $value_only = (is_assoc($options)) ? false : true;
    $attrs = array_merge($defaults, $attrs);
    ?>
    <div id="<?=$name?>-group" class="form-group <?php if(form_error($name)) { ?>has-error<?php } ?>">
        <?php if($label) { ?><label for="<?=$attrs['id']?>"><?=$label?></label><?php } ?>
        <select name="<?=$name?>" class="<?=$attrs['class']?>" id="<?=$attrs['id']?>" <?php if(isset($attrs['disabled']) && $attrs['disabled'] == true) { ?>disabled<?php } ?> <?=$attrs['extra']?> data-rule-id="<?=(!empty($attrs['rule_id'])) ? $attrs['rule_id'] : ''?>"> 
            <?php if(!$attrs['value'] && $attrs['placeholder'] !== false) { ?><option selected disabled><?=$attrs['placeholder']?></option><?php } ?>
            <?php foreach($options as $key => $value) { ?>
                <option <?php if($value_only) { ?>value="<?=$key?>" <?php if($attrs['value'] !== null && trim($key) == $attrs['value'] || trim($value) == $attrs['value']) { ?>selected<?php } ?><?php } else { ?> <?php if(trim($value) == $attrs['value']) {
              ?>selected<?php }} ?>><?=htmlspecialchars($value)?></option>
            <?php } ?>
        </select>
        <?php if(form_error($name)) { ?><span class="help-inline error"><?=form_error($name)?></span><?php } ?>
        <?php if(!empty($attrs['help'])) { ?><span class="help-inline info"><?=$attrs['help']?></span><?php } ?>
    </div>
    <?php
}

function checkbox($name, $label, $attrs = array()) {
    $defaults['class'] = 'form-control input-lg';
    $defaults['type'] = 'text';
    $defaults['placeholder'] = $label;
    $defaults['id'] = $name . 'Input';
    $defaults['value'] = null;
    $defaults['options'] = array();
    $defaults['key_value'] = false;
    $defaults['clearfix'] = false;
    if(isset($attrs['label'])) {
        $label = $attrs['label'];
    }
    $attrs = array_merge($defaults, $attrs);
    $options = (!is_array($attrs['options'])) ? explode(',', $attrs['options']) : $attrs['options'];
    ?>
    <div id="<?=$name?>-group" class="form-group <?php if(form_error($name)) { ?>has-error<?php } ?>">
        <?php if($label) { ?><label for="<?=$attrs['id']?>"><?=$label?></label><?php } ?>
        <?php if($attrs['key_value'] || $attrs['clearfix']) { ?><div class="clearfix"></div><?php } ?>
        <?php foreach($options as $i => $option) { ?>
            <label class="checkbox-inline">
              <input type="checkbox" id="<?=$attrs['id']?>_<?=$i?>" name="<?=$name?>[]" value="<?=($attrs['key_value']) ? $i : $option?>" data-rule-id="<?=(!empty($attrs['rule_id'])) ? $attrs['rule_id'] : ''?>"
               <?php 
                $_val = ($attrs['key_value']) ? $i : $option;
                if(is_string($attrs['value'])) { 
                    echo (strstr($_val, $option) !== FALSE) ? 'checked' : '';
                } elseif (is_array($attrs['value'])) {
                    echo (in_array($_val, $attrs['value'])) ? 'checked' : '';
                }
                ?>
               > <?=$option?>
            </label>
        <?php } ?>
        <div class="clearfix"></div>
        <?php if(form_error($name)) { ?><span class="help-block error"><?=form_error($name)?></span><?php } ?>
        <?php if(!empty($attrs['help'])) { ?><span class="help-block info"><?=$attrs['help']?></span><?php } ?>
    </div>
    <?php
}

function radio($name, $label, $attrs = array()) {
    $defaults['class'] = 'form-control input-lg';
    $defaults['type'] = 'text';
    $defaults['placeholder'] = $label;
    $defaults['id'] = $name . 'Input';
    $defaults['value'] = null;
    $defaults['clearfix'] = false;
    $defaults['options'] = array();
    if(isset($attrs['label'])) {
        $label = $attrs['label'];
    }
    $attrs = array_merge($defaults, $attrs);
    $options = (!is_array($attrs['options'])) ? explode(',', $attrs['options']) : $attrs['options'];
    ?>
    <div id="<?=$name?>-group" class="form-group <?php if(form_error($name)) { ?>has-error<?php } ?>">
        <?php if($label) { ?><label for="<?=$attrs['id']?>"><?=$label?></label><?php } ?>
        <?php if($attrs['clearfix']) { ?><div class="clearfix"></div><?php } ?>
        <?php foreach($options as $i => $option) { ?>
            <?php if(!strlen($option)) continue; ?>
            <label class="radio-inline">
              <input type="radio" id="<?=$attrs['id']?>_<?=$i?>" data-c-id="<?=$attrs['id']?>" name="<?=$name?>" value="<?=$option?>" data-rule-id="<?=(!empty($attrs['rule_id'])) ? $attrs['rule_id'] : ''?>" <?php if(strstr(strtolower($attrs['value']), strtolower($option)) !== FALSE) { ?>checked<?php } ?>> <?=$option?>
            </label>
        <?php } ?>
        <div class="clearfix"></div>
        <?php if(form_error($name)) { ?><span class="help-block error"><?=form_error($name)?></span><?php } ?>
        <?php if(!empty($attrs['help'])) { ?><span class="help-block info"><?=$attrs['help']?></span><?php } ?>
    </div>
    <?php
}