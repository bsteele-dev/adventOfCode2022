<?php
$elfCaloriesString = file_get_contents('./input/day1.txt');

$arrayOfElfCalories = explode("\n", $elfCaloriesString);
$maxCalories = 0;
$tempSum = 0;
foreach ($arrayOfElfCalories as $caloricEntry => $value) {
	$tempSum += (int)$value;
	if (empty($value)) {
		if ($tempSum >= $maxCalories) {
			$maxCalories = $tempSum;
		}
		$tempSum = 0;
	}
}

print "$maxCalories\n";
