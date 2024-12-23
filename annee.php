<?php
if (isset($_GET['annee'])){
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
                WHERE annee = :annee
                GROUP BY titre';
    
    $films = $bdd -> prepare($requete);
    
    $annee = $_GET['annee'];
    
    $filtre_1 = 'annee';
    $filtre_2 = $annee;
    

    $films -> execute([
        'annee' => $annee,
    ]);
    include('vues/html.php');
}
else {
    include('vues/index_annee.php');
}

