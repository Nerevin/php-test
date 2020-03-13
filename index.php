<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./src/css/index.css">
    </head>
    <body>
        <?php
            $dbhost = "localhost";
            $dbname = "игры";
            $dbuser = "root";
            $dbpass = "91YJDuoq";
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            if ($mysqli->connect_error) {
                die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
            };
            $strateges = $mysqli -> query("SELECT жанры.name AS genre_name,поджанры.name AS subgenres, title FROM жанры INNER JOIN поджанры ON жанры.id_genres = поджанры.id_genres INNER JOIN игры ON поджанры.id_subgenres = игры.id_subgenres WHERE поджанры.id_genres = 1");
            $shooter = $mysqli -> query("SELECT жанры.name AS genre_name,поджанры.name AS subgenres, title FROM жанры INNER JOIN поджанры ON жанры.id_genres = поджанры.id_genres INNER JOIN игры ON поджанры.id_subgenres = игры.id_subgenres WHERE поджанры.id_genres = 2");
            $RPG = $mysqli -> query("SELECT жанры.name AS genre_name,поджанры.name AS subgenres, title FROM жанры INNER JOIN поджанры ON жанры.id_genres = поджанры.id_genres INNER JOIN игры ON поджанры.id_subgenres = игры.id_subgenres WHERE поджанры.id_genres = 3");
            $rasing = $mysqli -> query("SELECT жанры.name AS genre_name,поджанры.name AS subgenres, title FROM жанры INNER JOIN поджанры ON жанры.id_genres = поджанры.id_genres INNER JOIN игры ON поджанры.id_subgenres = игры.id_subgenres WHERE поджанры.id_genres = 4");

            function pageGenere($gen) {
                $prevGenre = "";
                $prevSubgenre = "";
                while ($row = $gen -> fetch_assoc()) {
                    if($prevGenre != $row["genre_name"]){
                        echo "<p class=\"genre\">$row[genre_name]</p>";
                        $prevGenre = $row["genre_name"];
                    }
                    if($prevSubgenre != $row["subgenres"]){
                        echo "<p class=\"subgenre\">$row[subgenres]</p>";
                        $prevSubgenre = $row["subgenres"];
                    }
                    echo "<p class=\"title\">$row[title]</p>";
                }
            }
            pageGenere($strateges);
            pageGenere($shooter);
            pageGenere($RPG);
            pageGenere($rasing);
        ?>
    </body>
</html>