<?php
require_once("api/includes/session.php");
if(!checkSession()){
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <script src="style/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Hi-Tech Express</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index.php">Paneau</a>
          <a class="nav-item nav-link" href="AjoutArticle.php">Bon Reception</a>
          <a class="nav-item nav-link" href="ListeArticles.php?encoursatt">Materiel en cours/en attente</a>
          <a class="nav-item nav-link" href="ListeArticles.php?repare">materiel réparé</a>
          <a class="nav-item nav-link" href="ListeArticles.php?unreparable">materiel non réparé</a>
          <a class="nav-item nav-link" href="ListeArticles.php?sortie">Materiel Sortie</a>
          <a class="nav-item nav-link" href="ListeClients.php">Liste Clients</a>
        </div>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="nav-item nav-link" href="logout.php">logout(<?php echo $_SESSION['fullName'] ?>)</a></li>
      </ul>
    </nav>
    <div class="container" id="vue-app">
      <div style="text-align: center;padding-top: 27px;">
        <h3>liste Clients</h3>
      </div>
      <div class="">
        <table class="table table-striped">
          <tr>
            <td>identificateur</td>
            <td>nom</td>
            <td>telephone</td>
            <td>nombre totale des articles</td>
            <td>Articles en cours</td>
            <td>articles en attente</td>
            <td>Articles reparer</td>
            <td>articles unreparable</td>
            <td>articles sortie</td>
          </tr>
          <tr v-for="client in listClients">
            <td>{{client.id}}</td>
            <td>{{client.nom}}</td>
            <td>{{client.telephone}}</td>
            <td>{{client.totale}}</td>
            <td>{{client.encours}}</td>
            <td>{{client.enattente}}</td>
            <td>{{client.reparer}}</td>
            <td>{{client.unreparable}}</td>
            <td>{{client.sortie}}</td>
          </tr>
        </table>
      </div>
    </div>
  </body>
  <script src="vue/jquery.min.js"></script>
  <script src="vue/vue.js"></script>
  <script src="vue/vue-resource.js"></script>
  <script src="vue/ListeClients.js"></script>
</html>
