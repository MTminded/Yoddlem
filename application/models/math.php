<?php

class Math extends CI_Model{
	public function add($val1, $val2){
		return $val1+$val2;
	}

	public function sub($var1, $var2){
		return $var1-$var2;
	}

}

?>