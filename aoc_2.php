<?php
// TODO: Rework logic, maybe make score map.
// currently broken, part 2 not done
/**
 *Your total score is the sum of your scores for each round.
 * The score for a single round is the score for the shape you selected (1 for Rock, 2 for Paper, and 3 for Scissors)
 * plus the score for the outcome of the round (0 if you lost, 3 if the round was a draw, and 6 if you won).
 */

$puzzleInput = file_get_contents('./input/day2.txt');
$inputMovesArray = str_split($puzzleInput);

$moveNameMap = [
	'A' => 'Rock',
	'B' => 'Paper',
	'C' => 'Scissors',
	'X' => 'Rock', // lose
	'Y' => 'Paper', // draw
	'Z' => 'Scissors' // win
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

$counter = 0;
function solve1(array $inputMovesArray): void
{
	$totalScore = 0;

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

	print "round 1: $totalScore\n";
}

solve1($inputMovesArray);
solve2($inputMovesArray);


/*
 * X means you need to lose, Y means you need to end the round in a draw, and Z means you need to win. Good luck!"
 */
