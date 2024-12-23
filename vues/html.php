
<!DOCTYPE html>
<html>
  <head>
  <link rel="shortcut icon" href="/images/logo.png" type="image/png">
  <link href="./styles/style.css" rel="stylesheet">
  <title><?php echo "Filmographe [$filtre_1 par $filtre_2]" ?></title>
  </head>
  <body>
  <section id="haut">
    <h1 class="center_text">Recherche filtré par <?php echo "$filtre_1" ?></h1>

    <h2 class="center_text">Fitre : [<?php echo "$filtre_2" ?>]</h2>
    </section>
    <table>
      <thead class="color">
        <tr>
          <th>Titre</th>
          <th>Réalisateur</th>
          <th>Genre</th>
          <th>Année</th>
          <th>Résumer</th>
          <th>Note Moyenne</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($films as $film){
          echo "
          <tr>
            <td>{$film['titre']}</td>
            <td>{$film['prenom']} {$film['nom']}</td>
            <td>{$film['genre']}</td>
            <td>{$film['annee']}</td>
            <td>{$film['resume']}</td>
            <td>{$film['note_moyenne']}/10</td>
          </tr>";
        }
      ?>
      </tbody>
    </table>
    <section id="bas">
  <div class="div_page">
    <a class="button" href="<?php echo "$filtre_1" ?>.php">Recherche de nouveau par <?php echo "$filtre_1" ?> :</a>
    <a class="button" href="index.html">Recherche à nouveau :</a>
  </div>
  </section>

  <div class="button_page">
    <a class="button" href="#bas">⬇️</a>
    <a class="button" href="#haut" >⬆️</a>
  </div>
  </body>
</html>

