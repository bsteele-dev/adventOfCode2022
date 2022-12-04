<?php
$puzzleInput = file_get_contents('./input/day2.txt');

$testInput =
	<<< YEET
	A Y
	B X
	C Z
	YEET;
$testScore = 15;

/**
 *Your total score is the sum of your scores for each round.
 * The score for a single round is the score for the shape you selected (1 for Rock, 2 for Paper, and 3 for Scissors)
 * plus the score for the outcome of the round (0 if you lost, 3 if the round was a draw, and 6 if you won).
 */



$inputMovesArray = str_split($puzzleInput);

$moveNameMap = [
	'A' => 'Rock',
	'B' => 'Paper',
	'C' => 'Scissors',
	'X' => 'Rock',
	'Y' => 'Paper',
	'Z' => 'Scissors'
];

$moveScoreMap = [
	'Rock' => 1,
	'Paper' => 2,
	'Scissors' => 3
];

$outcomeScoreMap = [
	'Win' => 6,
	'Lose' => 0,
	'Draw' => 3
];

$totalScore = 0;
$counter = 0;
$oppMove = '';
$myMove = '';
foreach ($inputMovesArray as $index => $move) {
	$counter++;
	if ($counter === 4) {
		$counter = 0;
		continue;
	}

	if ($move === ' ') {
		continue;
	}

	if ($counter === 1) {
		$oppMove = $moveNameMap[$move];
		continue;
	} else {
		$myMove = $moveNameMap[$move];
		$totalScore += $moveScoreMap[$myMove];
	}

	if ($oppMove === $myMove) {
		$totalScore += $outcomeScoreMap['Draw'];
		continue;
	}

	if ($myMove === 'Rock') {
		if ($oppMove === 'Paper') {
			$totalScore += $outcomeScoreMap['Lose'];
		}

		if ($oppMove === 'Scissors') {
			$totalScore += $outcomeScoreMap['Win'];
		}
	}

	if ($myMove === 'Paper') {
		if ($oppMove === 'Scissors') {
			$totalScore += $outcomeScoreMap['Lose'];
		}

		if ($oppMove === 'Rock') {
			$totalScore += $outcomeScoreMap['Win'];
		}
	}

	if ($myMove === 'Scissors') {
		if ($oppMove === 'Rock') {
			$totalScore += $outcomeScoreMap['Lose'];
		}

		if ($oppMove === 'Paper') {
			$totalScore += $outcomeScoreMap['Win'];
		}
	}
}

print "$totalScore \n";
