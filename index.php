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
      <br><br><br>
      <div class="row">
        <div class="col-sm-2">
        <div class="card text-white bg-success">
          <div class="card-header">
            totale
          </div>
          <div class="card-body">
            <p>{{getTotale()}}</p>
          </div>
        </div>
      </div>
        <div class="col-sm-2">
        <div class="card text-white bg-success">
          <div class="card-header">
            en attente
          </div>
          <div class="card-body">
            <p>{{getEnattente()}}</p>
          </div>
        </div>
      </div>
        <div class="col-sm-2">
        <div class="card text-white bg-success">
          <div class="card-header">
            en cours
          </div>
          <div class="card-body">
            <p>{{getEncours()}}</p>
          </div>
        </div>
      </div>
        <div class="col-sm-2">
        <div class="card text-white bg-success">
          <div class="card-header">
            reparé
          </div>
          <div class="card-body">
            <p>{{getRepare()}}</p>
          </div>
        </div>
      </div>
        <div class="col-sm-2">
        <div class="card text-white bg-success">
          <div class="card-header">
            unreparables
          </div>
          <div class="card-body">
            <p>{{getUnreparable()}}</p>
          </div>
        </div>
      </div>
        <div class="col-sm-2">
          <div class="card text-white bg-success">
            <div class="card-header">
              sortie
            </div>
            <div class="card-body">
              <p>{{getSortie()}}</p>
            </div>
          </div>
        </div>
      </div>
      <div style="text-align: center;padding-top: 27px;">
        <h3>liste machines Totale</h3>
      </div>
      <div class="">
        <table class="table">
          <tr>
            <td>identificateur</td>
            <td>nom client</td>
            <td>telephone client</td>
            <td>marque</td>
            <td>Type</td>
            <td>referance</td>
            <td>panne</td>
            <td>date ajout</td>
            <td>etat</td>
          </tr>
          <tbody v-html="getList()">
          </tbody>
        </table>
    </div>
  </body>
  <script src="vue/jquery.min.js"></script>
  <script src="vue/vue.js"></script>
  <script src="vue/vue-resource.js"></script>
  <script src="vue/index.js"></script>
</html>
