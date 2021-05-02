<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Help extends CI_Model
{
	public function prettyCurrencyFormat($num) {
		$convert = ['RB', 'JT', 'M', 'T'];
		if($num != 0) {
			$x = round($num);
			$x_number_format = number_format($x);
			$x_array = explode(',', $x_number_format);
			$x_count_parts = count($x_array) - 1;
			$x_display = $x;
			$x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? ',' . $x_array[1][0] : '');
			$x_display .= $convert[$x_count_parts - 1];
			return $x_display;
		}
		else {
			return 0;
		}
	}
}