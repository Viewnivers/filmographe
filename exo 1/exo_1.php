<?php
$annee = readline('Année du film');
$genre = readline('Genre du film');

$bdd = new PDO(
    'mysql:host=localhost;dbname=films',
    'root',
    ''
);

$requete = 'SELECT titre, avg(note) as note_moyenne
            FROM film
            JOIN notation
            ON notation.id_film = film.id_film
            WHERE annee = :annee
            AND genre = :genre';

$films = $bdd -> prepare($requete);

$films -> execute([
    'annee' => $annee,
    'genre' => $genre
]);

foreach($films as $film){
    echo "{$film['titre']} ({$film['note_moyenne']}/10)" . PHP_EOL;
}

