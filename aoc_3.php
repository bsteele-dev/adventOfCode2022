<?php
/**
 * Each rucksack has two large compartments.
 * All items of a given type are meant to go into exactly one of the two compartments.
 *
 * A given rucksack always has the same number of items in each of its two compartments,
 * so the first half of the characters represent items in the first compartment,
 * while the second half of the characters represent items in the second compartment.
 *
 * To help prioritize item rearrangement, every item type can be converted to a priority:
 * 	- Lowercase item types a through z have priorities 1 through 26.
 * 	- Uppercase item types A through Z have priorities 27 through 52.
 *
 * In the above example, the priority of the item type that appears
 * in both compartments of each rucksack is
 * 16 (p), 38 (L), 42 (P), 22 (v), 20 (t), and 19 (s);
 * the sum of these is 157.
 *
 * Find the item type that appears in both compartments of each rucksack.
 * What is the sum of the priorities of those item types?
 */

$test = 'wgqJtbJMqZVTwWPZZT
LHcTGHQhzrTzBsZFPHFZWFFs
RnLRClzGzRGLGLGCNRjTMjJfgmffSffMqNgp
WPLgsfLmLgqZvZgSRR
RbwHdbDdQFFFMvvMjbhqhZZS
lzTdldBDszfGcRsr';

$testOutput = 157;

// Open the input file to stream each line
$inputFile = fopen('./input/day3.txt', 'r');
if ($inputFile) {
	$priorityValueMap = prepareValueMap();
	$prioritySum = 0;
	while (($line = fgets($inputFile)) !== false) {
		// Split inventory into halves
		// This actually creates 3 items in the array.
		// The third item is a line-feed I can't fucking shake, even with trim
		$compartmentItems = str_split($line, (strlen($line) / 2));

		// Arrayitimize each string so we can use array_intersect to tickle out the common item
		$leftCompartment = str_split($compartmentItems[0]);
		$rightCompartment = str_split($compartmentItems[1]);

		// Find the common items in both lists.
		// and increment sum by referencing value map
		$commonItems = array_intersect($leftCompartment, $rightCompartment);
		$prioritySum += $priorityValueMap[reset($commonItems)];
	}
fclose($inputFile);

print "$prioritySum\n";
}

/**
 * Prepares map of values to determine total score of priority items
 * 	- Lowercase item types a through z have priorities 1 through 26.
 * 	- Uppercase item types A through Z have priorities 27 through 52.
 * @return array
 */
function prepareValueMap(): array
{
	// zeroith index will fuck with aligning the proper priority score to letters
	// initialize with something to take up first slot
	$valueMap = [0];

	// Load our map of letters/score
	// Lowercase alphabet starts at ASCII code 97
	// Uppers start at ASCII code 65
	foreach (range(97, 122) as $code) {
		$valueMap[] = chr($code);
	}
	foreach (range(65, 90) as $code) {
		$valueMap[] = chr($code);
	}
	// Flip our array so letters become the keys
	return array_flip($valueMap);
}
