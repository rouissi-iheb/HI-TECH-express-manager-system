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
      <br><br>
      <center><h2>Intervention</h2></center>
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="form-group">
            <br><br>
            <textarea class="form-control" rows="8" cols="80" placeholder="Details de l'intervention" v-model="details"></textarea>
            <br>
            <input type="text" class="form-control" placeholder="Prix de cet intervention" v-model="prix">DT
            <br>
            <select class="form-control" v-model="etat">
              <option value="enattente">en attente</option>
              <option value="encours">en cours</option>
              <option value="repare">reparé</option>
              <option value="unreparable">unreparable</option>
            </select>
            <br>
            <button class="btn btn-primary" @click="ajoutIntervention()" name="button">confirmer</button>
          </div>
        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>
  </body>
  <script src="vue/jquery.min.js"></script>
  <script src="vue/vue.js"></script>
  <script src="vue/vue-resource.js"></script>
  <script>
    Vue.use(VueResource);
    new Vue({
        el: '#vue-app',
        data: {
          ida:'<?php echo $_GET['id']; ?>',
          details:'',
          prix:'',
          etat:''
        },
        methods: {
          //ajouter un nouveau article a la base :
          ajoutIntervention: function(){
            this.$http.post('api/intervention/intervention.php',{
              ida:this.ida,
              details: this.details,
              prix: this.prix,
              etat: this.etat
            }).then(function(resp){
              if(resp.bodyText == 'done'){
                console.log(resp.bodyText);
              }
              window.location="ListeArticles.php?encoursatt";
              console.log(resp.bodyText);
            })
          }
        }// fin methodes
    });
  </script>
</html>
