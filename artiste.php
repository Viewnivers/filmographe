<?php
if (isset($_GET['artiste'])){
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
                WHERE nom = :artiste
                GROUP BY titre';
    
    $films = $bdd -> prepare($requete);
    


    $artiste = $_GET['artiste'];
    
    $films -> execute([
        'artiste' => $artiste,
    ]);

    $filtre_1 = 'artiste';
    $filtre_2 = $artiste;

    include('vues/html.php');
}
else {
    include('vues/index_artiste.php');
}

