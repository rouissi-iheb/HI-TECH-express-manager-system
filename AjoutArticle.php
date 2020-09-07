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
        <h3>ajouter nouveau article</h3>
      </div>
    <div class="row" style="padding-top:80px;">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <br><br>
            <div>
              <label>Client</label>
              <hr>
              <div v-bind:class="{disp:showClientPanel}"  class="">
                <input type="text" @keyup="rechercheClient" v-model="ajoutdata.client.nom" class="form-control" placeholder="nom client" list="list"><br>
                <input type="text" v-model="ajoutdata.client.numtel"  class="form-control" placeholder="numero de telephone"><br>
              </div>

              <div v-bind:class="{disp:!showClientPanel}" class="card text-white bg-success" style="padding-buttom:30px;">
                <div class="card-header">
                  Client :
                </div>
                <div class="card-body">
                  <p>
                    id client : {{clientpaneldetailes.id}} <br>
                    nom&prenom: {{clientpaneldetailes.nom}} <br>
                    telephone : {{clientpaneldetailes.telephone}} <br>
                  </p>
                  <button class="btn btn-warning btn-sm" @click.prevent="annulerChoixClient">annuler</button>
                </div>
              </div>
              <br>
              <label>Article</label>
              <hr>
              <div v-bind:class="{disp:!showAjoutDone}" class="card text-white bg-success">
                <div class="card-header">
                  Article ajouter ! Detailles :
                </div>
                <div class="card-body">
                  <p>
                    nom & prenom: {{ajoutdata.client.nom}} <br>
                    telephone : {{ajoutdata.client.numtel}} <br>
                    marque : {{ajoutdata.article.marque}}<br>
                    referance : {{ajoutdata.article.referance}}<br>
                  </p>
                </div>
              </div>
              <div v-bind:class="{disp:showAjoutDone}" class="">
                <select class="form-control" v-model="ajoutdata.article.type.id"  v-html="getTypeArticles()" @change="checkArticleAutre"></select>
                <br v-bind:class="{disp:!showArticleAutre}">
                <input type="text" v-bind:class="{disp:!showArticleAutre}" v-model="ajoutdata.article.type.autre" class="form-control" placeholder="Autre Article"><br>
                <input type="text" v-model="ajoutdata.article.marque" class="form-control" placeholder="marque"><br>
                <input type="text" v-model="ajoutdata.article.referance" class="form-control" placeholder="referance"><br>
                <input type="text" v-model="ajoutdata.article.remarques" class="form-control" placeholder="remarques"><br>
                <select class="form-control" v-model="ajoutdata.article.panne.id" v-html="getTypePannes()" @change="checkPanneAutre"></select>
                <br>
                <input type="text" v-bind:class="{disp:!showPanneAutre}" v-model="ajoutdata.article.panne.autre" class="form-control" placeholder="autre panne"><br>
                <button @click="ajoutNvArticle" class="btn btn-primary">ajout article</button>
                <br><br><br>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <table class="table" v-if="listerechercheclients.length">
              <tr>
                <td>nom</td>
                <td>telephone</td>
                <td>action</td>
              </tr>
              <tr v-for="client in listerechercheclients">
                <td>{{client.nom}}</td>
                <td>{{client.telephone}}</td>
                <td>
                  <button class="btn btn-primary btn-sm" @click="showClientData(client.id)">selectionner</button>
                </td>
              </tr>
            </table>
          </div>
    </div>
  </body>
  <script src="vue/jquery.min.js"></script>
  <script src="vue/vue.js"></script>
  <script src="vue/vue-resource.js"></script>
  <script src="vue/vue-router.js"></script>
  <script src="vue/ajoutArticle.js"></script>
</html>
