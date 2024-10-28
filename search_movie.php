<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $movieName = urlencode($_POST['movieName']);

    // IMDb API Request
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.collectapi.com/imdb/imdbSearchByName?query=" . $movieName,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "authorization: apikey YOUR_API_KEY",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error: " . $err;
    } else {
        $movieData = json_decode($response, true);

        if ($movieData['success']) {
            $movieDetails = $movieData['result'][0];

            // Extract movie details
            $movieTitle = $movieDetails['Title'];
            $movieYear = $movieDetails['Year'];
            $moviePoster = $movieDetails['Poster'];
            $imdbRating = $movieDetails['Ratings'][0]['Value'];  // IMDb rating
            $boxOffice = $movieDetails['BoxOffice'];

            // Logic to determine if the movie is a "hit" or "flop"
            $imdbRatingValue = floatval(explode("/", $imdbRating)[0]); // Convert "8.8/10" to 8.8
            $hitOrFlop = $imdbRatingValue >= 7.0 ? "Hit" : "Flop"; // Example logic based on IMDb rating

            // Display results
            echo "<h1>Movie: $movieTitle ($movieYear)</h1>";
            echo "<img src='$moviePoster' alt='Movie Poster' style='width:300px;'>";
            echo "<h2>IMDb Rating: $imdbRating</h2>";
            echo "<h2>Box Office: $boxOffice</h2>";
            echo "<h2>Result: $hitOrFlop</h2>";
        } else {
            echo "Movie not found.";
        }
    }
}
?>
