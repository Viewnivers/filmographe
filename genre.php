<?php
if (isset($_GET['genre'])){
    $bdd = new PDO(
        'mysql:host=localhost;dbname=films',
        'root',
        ''
    );
    
    $requete = 'SELECT DISTINCT titre,annee,genre,resume,nom,prenom,avg(note) as note_moyenne
                FROM film
                JOIN notation
                ON notation.id_film = film.id_film
                JOIN artiste
                ON film.id_Realisateur = artiste.id_artiste
                WHERE genre = :genre
                GROUP BY titre';
    
    $films = $bdd -> prepare($requete);
    
    $genre = $_GET['genre'];
    
    $filtre_1 = 'genre';
    $filtre_2 = $genre;

    $films -> execute([
        'genre' => $genre,
    ]);
    include('vues/html.php');
}
else {
    include('vues/index_genre.php');
}

