<?php

/***
 * After the rearrangement procedure completes, what crate ends up on top of each stack?
 *
 * Crates are moved one at a time
 */


/***
 * Test data:
 *
 *	[D]
 *	[N] [C]
 *	[Z] [M] [P]
 *	1   2   3
 *
 *	move 1 from 2 to 1
 *	move 3 from 1 to 3
 *	move 2 from 2 to 1
 *	move 1 from 1 to 2
 *
 * Expected output:
 * CMZ
 *
 */

// Load file
$file = file_get_contents('./input/day5.txt');
$chunkedInput = explode("\n", $file);
debug($chunkedInput);

// Parse input
$stackComplete = false;
$crateStacks = [];
foreach ($chunkedInput as $lineNumber => $value) {
	// read until digit is 1 which signals end of crates
	// The values on this row represent each section
	// we need each section to be its own array
	if (!$stackComplete && strpos(ltrim($value), 1) === 0) {
		$filteredArray = array_filter(str_split($value), 'removeBlanks');
		// Stack names/positions are in values,
		// flip to values to be keys of new array then nuke values
		$filteredArray = array_flip($filteredArray);
		$crateStacks = array_fill_keys(array_keys($filteredArray), []);
		// now we can fill our stacks with crates
		// go back to beginning of input and start parsing crates up to this line -1
		$returnArray = [];
		for ($i = 0; $i < $lineNumber; $i++) {
			$chars = strlen($chunkedInput[$i]);
			$n = 1;
			$tempArray = [];
			// should prob optimize to skip every n + 4 char instead of looping over everything...
			for ($k = 0; $k < $chars; $k++) {
				if ($k === $n) {
					$tempArray[] = substr($chunkedInput[$i], $n, 1);
					$n += 4;
				}
			}
			$returnArray[$i] = $tempArray;
		}
		// our returnArray is filled with values
		// that need to be transposed
		//
		// we can iterate through our vertical stack
		// pulling off the first item and moving to the same spot
		// in the cratesStacks array
		foreach ($returnArray as $retLine => $horizontalValues) {
			foreach ($horizontalValues as $position => $crateValue) {
				if (!ctype_space($crateValue)) {
					$crateStacks[$position + 1][] = $crateValue;
				}
			}
		}
		$stackComplete = true;
	}

	// now we are past the input
	// we have a blank line before we get to instructions
	// which begin with move
	if (strpos(ltrim($value), 'move') === 0) {
		preg_match_all('/\d+/', $value, $matches);
		$quantity = $matches[0][0];
		$sourceStack = $matches[0][1];
		$destinationStack = $matches[0][2];

//		solvePart1($quantity, $sourceStack, $destinationStack, $crateStacks);
		solvePart2($quantity, $sourceStack, $destinationStack, $crateStacks);
	}
}

debug("OUTCOME");
debug(getTopOfStacks($crateStacks));

function solvePart1(int $quantity, int $source, int $dest, &$crateStack): void
{
	for ($totalMoves = 0; $totalMoves < $quantity; $totalMoves++) {
		$value = array_shift($crateStack[$source]);
		array_unshift($crateStack[$dest], $value);
	}
}

function solvePart2(int $quantity, int $source, int $dest, &$crateStack): void
{
	$tempArray = [];
	for ($totalMoves = 0; $totalMoves < $quantity; $totalMoves++) {
		$value = array_shift($crateStack[$source]);
		$tempArray[] = $value;
	}
	array_unshift($crateStack[$dest], ...$tempArray);
}

function getTopOfStacks(array $crateStacks): string
{
	$returnString = '';
	foreach ($crateStacks as $stack) {
		if (!empty($stack)) {
			$returnString .= $stack[0];
		}
	}
	return $returnString;
}

function debug($message): void
{
	print "\n";
	print_r($message);
	print "\n";
}

function removeBlanks(string $value): string
{
	return $value === ' ' ? '' : $value;
}


