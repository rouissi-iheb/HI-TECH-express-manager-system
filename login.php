<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <script src="style/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/login.css">
  </head>
  <body>
    <div class="wrapper fadeInDown" id="vue-app">
      <div id="formContent">
        <br><br>
        <div>
          <img src="style/img/logo.png" height="60px" width="180px">
          <br>
          <div v-bind:class="{disp:!showError}" class="card text-white bg-danger">
            <div class="card-body">
              <p>mot de pass incorrecte ! </p>
            </div>
          </div>
          <br>
          <div style="padding-right:20px;padding-left:20px;">
            <input type="text" class="form-control second" v-model="user" placeholder="nom d'utilisateur">
            <br>
            <input type="password" class="form-control third" v-model="pass" placeholder="mot de passe">
          </div>
          <br><br>
          <button @click="login()" class="btn btn-primary">connection</button>
        </div>
        <br>
        <br>
      </div>
    </div>
  </body>
  <script src="vue/jquery.min.js"></script>
  <script src="vue/vue.js"></script>
  <script src="vue/vue-resource.js"></script>
  <script src="vue/login.js"></script>
</html>
