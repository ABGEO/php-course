<?php

// Get JSON from the API.
$json = file_get_contents('https://api.chucknorris.io/jokes/random');

// Convert API response to the PHP array.
$jsonArray = json_decode($json, true);

echo "<img src='{$jsonArray['icon_url']}' />";
echo "<p>Random Joke: {$jsonArray['value']}</p>";
echo "<a href='{$jsonArray['url']}' target='_blank'>Source</a>";
