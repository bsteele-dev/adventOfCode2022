<?php
$elfCaloriesString = file_get_contents('./input/day1.txt');

$arrayOfElfCalories = explode("\n", $elfCaloriesString);
$maxCalories = [];
$tempSum = 0;
foreach ($arrayOfElfCalories as $caloricEntry => $value) {
	$tempSum += (int)$value;
	if (empty($value)) {
		if ($tempSum >= $maxCalories[0]) {
			array_unshift($maxCalories, $tempSum);
		}
		$tempSum = 0;
	}
}

print "Highest Calorie Count: $maxCalories[0]\n";
print "Sum of Calories of Top 3 Elves: " . ($maxCalories[0] + $maxCalories[1] + $maxCalories[2]) . "\n";
