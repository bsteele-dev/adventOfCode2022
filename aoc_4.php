<?php
/**
 * In how many assignment pairs does one range fully contain the other?
 *
 * Example Input;
 * 	2-4,6-8
 *	2-3,4-5
 *	5-7,7-9
 *	2-8,3-7
 *	6-6,4-6
 *	2-6,4-8
 *
 * Answer: 2
 */

$file = file_get_contents('./input/day4.txt');
$chunkedInput = explode("\n", $file);

// [0] => 2-4,6-8
// [1] => 2-3,4-5
// [2] => 5-7,7-9
// [3] => 2-8,3-7
// [4] => 6-6,4-6
// [5] => 2-6,4-8
// 99-99,1-99
// 3-96,1-97
// 2-99,98-99
$completeOverlap = 0;
$partialOverlap = 0;
foreach ($chunkedInput as $i => $section) {
	if (empty($section)) {
		continue;
	}

	$pieces = explode(',', $section);

	$first = explode('-', $pieces[0]);
	$start1 = $first[0];
	$end1 = $first[1];

	$second = explode('-', $pieces[1]);
	$start2 = $second[0];
	$end2 = $second[1];

	if (($start1 >= $start2 && $end1 <= $end2) || ($start2 >= $start1 && $end2 <= $end1)) {
		$completeOverlap++;
	}

	if (($start1 >= $start2 && $start1 <= $end2) || ($start2 >= $start1 && $start2 <= $end1)) {
		$partialOverlap++;
	}
}

/**
 * PART 1
 *
 * In how many assignment pairs does one range fully contain the other?
 *
 */

print "Part 1: $completeOverlap\n";

/**
 * PART 1
 *
 * In how many assignment pairs do the ranges overlap?
 *
 */

print "Part 2: $partialOverlap\n";
