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
    <link rel="stylesheet" href="style/css/icons.css">
  </head>
  <body onload="setTimeout(window.print, 1000)">
    <div class="container" id="vue-app">
      <div class="row">
        <div class="col-sm-8">
          <img src="style/img/logo.png" height="60px" width="180px">
        </div>
        <div class="col-sm-4">
          <p>
            <img src="style/img/support.png" width="24px" height="24px"alt="">SAV : 29 76 02 02 - 29 22 22 87 - commercial : 29 96 02 02<br>
            <img src="style/img/mail.png" width="24px" height="24px"alt="">mail:contact@hi-tech-express.tn
          </p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <center>IDC:{{data.id_client}} | IDA:{{data.id}} </center>
          <center>BON
            <?php
              if(isset($_GET['reception'])){
                echo 'DE RECEPTION';
              }elseif(isset($_GET['intervention'])){
                echo "D'INTERVENTION";
              }else{
                echo 'DE SORTIE';
              }
            ?>
          </center>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <table class="table">
            <tr>
              <td><b>Client : </b></td>
            </tr>
            <tr>
              <td>
                <p>
                  <b>Nom du client :</b> {{data.client.nom}}<br>
                  <b>Num de Tel :</b> {{data.client.telephone}} <br>
                  <b>Date :</b> {{data.date}} <br>
                </p>
              </td>
            </tr>
          </table>
        </div>

        <div class="col-sm-6">
          <table class="table">
            <tr>
              <td><b>Article</b></td>
            </tr>
            <tr>
              <td>
                <p>
                  <b>Type :</b> {{data.type}}<br>
                  <b>Marque et Référance :</b> {{data.marque}}  / {{data.ref}}<br>
                  <b>Autre détails et remarques :</b> {{data.remarques}} <br>
                  <b>Description de la panne :</b> {{data.panne}}
                </p>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <table class="table">
            <tr>
              <td><b>Intervention</b></td>
            </tr>
            <tr>
              <td>
                <p>
                  <b>Date début d'intervention:</b> {{data.datedebint}}<br>
                  <b>Date fin d'intervention :</b> {{data.datefinint}} <br>
                  Detail de l'intervention :<br>
                  <table class="table">
                    <thead>
                      <tr>
                        <td>Date</td>
                        <td>Details</td>
                        <td>Prix (en DT) </td>
                      </tr>
                    </thead>
                    <tbody v-for="intr in listinterv">
                      <tr>
                        <td>{{intr.date}}</td>
                        <td>{{intr.detailes}}</td>
                        <td>{{intr.prix}}</td>
                      </tr>
                    </tbody>
                  </table>
                  <br><br>
                  Prix Totale : {{data.prixtotale}} DT
                </p>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-sm-6">
          <table class="table">
            <tr>
              <td><b>Rapport</b></td>
            </tr>
            <tr>
              <td>
                <p>
                  <b>Observation:</b> {{data.etat}}<br>
                </p>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table">
            <tr>
              <td align="center">
                <b>VISA</b>
              </td>
            </tr>
            <tr>
              <td><b>Technicien</b></td>
              <td><b>Client</b></td>
              <tr>
                <td>
                  <p>
                    <b>Nom :</b> {{data.user.fullName}}<br>
                    <b>Date :</b> <?php echo '20'.date("y-m-d");  ?><br>
                    signature
                  </p>
                </td>
                <td>
                  <p>
                    <b>Nom :</b> {{data.client.nom}}<br>
                    <b>Date :</b><br>
                    signature
                  </p>
                </td>
              </tr>
            </tr>
          </table>
        </div>
      </div>
      <br><br><br><br>
        <footer>
          <hr>
          <p>
            <small><small><center>
              H-Tech Express est une société de conseil, de service aussi de vente des Equipements, fournitures informatiqueset bureautiques.<br>
              MF:1574632/2/A/M/000 - Adresse: Avenue Jdeida Maghrebia 8000 Nabeul a 200m de la Jarra | Site web: www.hi-tech-express.tn | Email:contact@hi-tech-express.tn<br>
              Tel Commercial : 72 22 02 02 | Tel SAV : 72 22 22 12 | Fax : 72 23 22 25
          </center></small></small>
          </p>
          <hr>
        </footer>
    </div>
    <script src="vue/jquery.min.js"></script>
    <script src="vue/vue.js"></script>
    <script src="vue/vue-resource.js"></script>
    <script>
      Vue.use(VueResource);
      new Vue({
          el: '#vue-app',
          data: {
            listinterv:[],
            data:{}
          },
          mounted:function(){
            var url = 'api/imprimer/imprimer.php?id=<?php echo $_GET['id']; ?>';
            $.ajax({
              url : url,
              type: 'GET',
              dataType: 'json',
            })
            .done(function(data) {
              this.data = data;
            }.bind(this))
            var url = 'api/imprimer/imprimer.php?id=<?php echo $_GET['id']; ?>&intervention';
            $.ajax({
              url : url,
              type: 'GET',
              dataType: 'json',
            })
            .done(function(data) {
              this.listinterv = data;
              //window.setTimeout(window.print(),5000);
            }.bind(this))

          }
      });
    </script>
  </body>
</html>
