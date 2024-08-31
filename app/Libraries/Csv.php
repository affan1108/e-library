<?php
namespace App\Libraries;

class Csv {
	public static function toArray($csv)
	{
		$lines = explode(PHP_EOL, $csv);
	    $rows = [];
	    foreach ($lines as $x) {
			if(!empty($x)) {
				$rows[] = str_getcsv($x);
			}
	    }

	    return $rows;
	}
}