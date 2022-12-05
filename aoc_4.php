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

//2--4, 6--8
//2-8,3-7
//
//
//[[2,3,4], [6,7,8]],
//[[2,3,4,5,6,7,8], [3,4,5,6,7]]

/// add all items to array/map
// run map reduce function thing to do stuff?

$file = file_get_contents('./input/day4_test.txt');
$chunkedInput = str_split($file);
foreach (range())

$pointer = -1;
$start1 = 0;
$start2 = 0;
$end1 = 0;
$end2 = 0;
$bazinga = 0;
//[0] => 2
//    [1] => -
//[2] => 4
//    [3] => ,
//    [4] => 6
//    [5] => -
//[6] => 8
//    [7] =>

//
//
//foreach ($chunkedInput as $i => $section) {
//	print "index: $i => section: $section\n";
//	$pointer++;
//	if ($pointer === 1 || $pointer === 3) {
//		continue;
//	}
//
//	if ($pointer === 7) {
//		print "pointer value reset\n";
//		$pointer = -1;
//		continue;
//	}
//
//	if ($pointer === 0 || $pointer === 4) {
//		print "pointer value z|f: $pointer\n";
//		if ($pointer === 0) {
//			$start1 = $section;
//			print "setting start2 to $start2\n";
//			continue;
//		}
//
//		$start2 = $section;
//		print "setting start2 to $start2\n";
//		continue;
//	}
//
//	if ($pointer === 2 || $pointer === 6) {
//		if ($pointer === 2) {
//			$end1 = $section;
//			continue;
//		}
//
//		$end2 = $section;
//	}
//
//	if (($start1 >= $start2 && $end1 <= $end2) || ($start2 >= $start1 && $end2 <= $end1)) {
//		print "start1: $start1 — end1: $end1\n";
//		print "start2: $start2 — end2: $end2\n";
//		$bazinga++;
//	}
//
//	$start1 = 0;
//	$start2 = 0;
//	$end1 = 0;
//	$end2 = 0;
//	$pointer = 0;
//}
//
//print "$bazinga\n";



//time
//$before = microtime(true);
//
//for ($i=0 ; $i<100000 ; $i++) {
//	serialize($list);
//}
//
//$after = microtime(true);
//echo ($after-$before)/$i . " sec/serialize\n";

