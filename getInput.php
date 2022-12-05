<?php

$inputBaseURI = 'https://adventofcode.com/2022/day/@DAY@/input';
$sessionCookie = '53616c7465645f5ff51b882cb1009020accee3f8f92f6c7765814afaf4adf57647bfb74b9812cf14ce8a8ac3fec33e91d0211362c4bd2af108e1e69bfa4ec6ec';

$day = $argv[1];
$daysInputURI = preg_replace('/\@DAY\@/', $day, $inputBaseURI);

$curlHandler = curl_init();
curl_setopt($curlHandler, CURLOPT_URL, $daysInputURI);
curl_setopt($curlHandler, CURLOPT_HEADER, false);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlHandler, CURLOPT_COOKIE, "session=$sessionCookie");

$result = curl_exec($curlHandler);
curl_close($curlHandler);

file_put_contents("./input/day$day.txt", $result);
