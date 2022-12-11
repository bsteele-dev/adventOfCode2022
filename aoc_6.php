<?php
/**
 * To be able to communicate with the Elves, the device needs to lock on to their signal.
 * The signal is a series of seemingly-random characters that the device receives one at a time.
 * you need to add a subroutine to the device that detects a start-of-packet marker in the datastream.
 *
 * In the protocol being used by the Elves, the start of a packet is indicated by a sequence of four characters that are all different.
 *
 *  your subroutine needs to identify the first position where the four most recently received characters were all different.
 *  Specifically, it needs to report the number of characters from the beginning of the buffer to the end of the first such four-character marker.
 */
/**
 * Here are a few more examples:

bvwbjplbgvbhsrlpgdmjqwftvncz: first marker after character 5
nppdvjthqldpwncqszvftbrmjlhg: first marker after character 6
nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg: first marker after character 10
zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw: first marker after character 11

How many characters need to be processed before the first start-of-packet marker is detected?
 */

/**
 * Part 2
 * A start-of-message marker is just like a start-of-packet marker, except it consists of 14 distinct characters rather than 4.
 */



$stream = fopen('./input/day6.txt', 'r');

function process($stream, int $packetLength)
{
	$counter = 0;
	while ($stream) {
		$content = $copyContent = stream_get_contents($stream, $packetLength, $counter);
		$doubleArray = str_split($content . $copyContent);
		$uniqueArray = array_unique($doubleArray);

		if (count($uniqueArray) == $packetLength) {
			$counter += $packetLength;
			$stream = !fclose($stream);
			continue;
		}
		$counter++;
		}
	return $counter;
	}




print "Answer 1: " . process($stream, 4) . "\n";
//print "Answer 2: " . process($stream, 14) . "\n";






