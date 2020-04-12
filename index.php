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
function even($input) 
{ 
	return !($input & 1); 
} 

// filter even-index elements 
$even = array_filter($input, "even"); 

// print even-indexed array 
print"\nEven array :\n"; 
print_r($even);

echo "<br>";
echo "<h1>Function sum </h1>";

function sum($num1,$num2)
{
	$sum=0;
	for ($i=0; $i <$num2; $i++) 
	$sum+=$num1[$i];
	return $sum;
}
$num1=array(1,2,4,5,7,8);
$num2=sizeof($num1);
echo "Sum:".sum($num1,$num2);
?>
