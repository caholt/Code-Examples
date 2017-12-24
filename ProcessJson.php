<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
$TestFile1 = "stocks.json";

$row = 1;
$Array = array();
if (($handle = fopen($TestFile1, "r")) !== FALSE) {
	while (($buffer = fgets($handle, 4096)) !== false) {
		if($buffer != '')
		{
			$Arow = json_decode(trim($buffer),true);
			if($Arow != '')
				$Array[] = $Arow;
		} 
	}
	
	fclose($handle);
}

//var_dump($Array);

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';
?>
