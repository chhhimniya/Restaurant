<?php
 $a=strrev("emocleW ot PHP");
 $b=substr($a,6);
 $c=substr($a,3,4);
 $d=substr($a,0,3);
$e= $b.$c.$d;
echo $e;
echo "<br>";
echo '<h1>Even Number Using Arrow Number</h1>'."<br>";

$input = array(2, 3, 4, 6, 7, 9, 11, 20); 

// comparator function to filter odd elements 

$factor = 10;
$nums = array_map(fn($n) => $n*2,$input);
print_r($nums);

function sum($num1,$num2)
{
	

	for ($i=0; $i < count($num2) ; $i++) { 
		 
		return $total=$num2+$num2[$i];
	}
}
echo 'Here is'.sum(2,3,4);

?>
