<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($result['Title']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .status {
            text-align: center;
            font-size: 1.5em;
            margin: 10px 0;
            color: <?php echo isset($success) && $success ? 'green' : (isset($message) && $message === "Average" ? 'orange' : 'red'); ?>;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .details {
            margin-top: 20px;
        }
        .detail-item {
            margin: 10px 0;
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
        }
        .detail-item:last-child {
            border-bottom: none;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .back-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($result['Title']); ?></h1>
        <div class="status"><?php echo $message; ?></div>
        <img src="<?php echo htmlspecialchars($result['Poster']); ?>" alt="<?php echo htmlspecialchars($result['Title']); ?> Poster">
        <div class="details">
            <div class="detail-item"><strong>Year:</strong> <?php echo htmlspecialchars($result['Year']); ?></div>
            <div class="detail-item"><strong>Rated:</strong> <?php echo htmlspecialchars($result['Rated']); ?></div>
            <div class="detail-item"><strong>Genre:</strong> <?php echo htmlspecialchars($result['Genre']); ?></div>
            <div class="detail-item"><strong>Director:</strong> <?php echo htmlspecialchars($result['Director']); ?></div>
            <div class="detail-item"><strong>Actors:</strong> <?php echo htmlspecialchars($result['Actors']); ?></div>
            <div class="detail-item"><strong>Plot:</strong> <?php echo htmlspecialchars($result['Plot']); ?></div>
            <div class="detail-item"><strong>IMDb Rating:</strong> <?php echo htmlspecialchars($result['imdbRating']); ?></div>
            <div class="detail-item"><strong>Box Office:</strong> <?php echo htmlspecialchars($result['BoxOffice']); ?></div>
            <div class="detail-item"><strong>Awards:</strong> <?php echo htmlspecialchars($result['Awards']); ?></div>
        </div>
        <div class="button-container">
            <a href="index.html" class="back-button">Back to Search</a>
        </div>
    </div>
</body>
</html>
