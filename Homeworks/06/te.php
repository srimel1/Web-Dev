<head>
    <meta charset="utf-8">
    <title>Input Artist</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>

<div class="container">
    <div class="artist">
        <h2>Add An Artist</h2>
        <h3>Enter the album artist, album name, year, and genre, and then click enter.</h3>

        <form action="authenticate.php" method="post">


            <label for="name">
                Artist Name
            </label>
            <input type="name" name="name" placeholder="name" id="name" required="">

            <br>
            <label for="artist">
                Album Name
            </label>

            <input type="artist" name="artist" placeholder="artist" id="artist" required="">
            <br>
            <label for="name">
                Year
            </label>
            <input type="year" name="year" placeholder="year" id="year" required="">
            <br>

            <label for="genre">
                Genre
            </label>
            <input type="genre" name="genre" placeholder="genre" id="genre" required="">


            <input type="submit" value="Submit Artist">
        </form>

        <p></p>
    </div>
    <div class="album">
        <h2>Add An Album</h2>
        <h3>Enter the album artist, album name, year, and genre, and then click enter.</h3>
        <form action="authenticate.php" method="post">


            <label for="name">
                Artist Name
            </label>
            <input type="name" name="name" placeholder="name" id="name" required="">

            <br>
            <label for="artist">
                Album Name
            </label>

            <input type="artist" name="artist" placeholder="artist" id="artist" required="">
            <br>
            <label for="name">
                Year
            </label>
            <input type="year" name="year" placeholder="year" id="year" required="">
            <br>

            <label for="genre">
                Genre
            </label>
            <input type="genre" name="genre" placeholder="genre" id="genre" required="">


            <input type="submit" value="Submit Album">
        </form>
    </div>

</div>