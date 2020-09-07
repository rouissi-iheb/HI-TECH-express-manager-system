Vue.use(VueResource);
new Vue({
    el: '#vue-app',
    data: {
      showArticleAutre: false,
      showPanneAutre: false,
      showClientPanel: false,
      showAjoutDone:false,
      clientpaneldetailes:{
        id:'',
        nom:'',
        telephone:''
      },
      listePannes : '',
      listeArticles : '',
      listerechercheclients:[],
      ajoutdata:{
        client:{
          id:'',
          nom:'',
          numtel:''
        },
        article:{
          type:{
            id:'',
            autre:'',
          },
          marque:'',
          referance:'',
          remarques:'',
          panne:{
            id:'',
            autre:''
          }
        }
      },
      },
    methods: {
      // search for client by name
      rechercheClient: function() {
      var url = 'api/ajout/rechercheClients.php?req=' + this.ajoutdata.client.nom;
      $.ajax({
        url : url,
        type: 'GET',
        dataType: 'json',
      })
      .done(function(data) {
        this.listerechercheclients = data;
      }.bind(this))
      console.log(this.listerechercheclients);
    },
    showClientData: function(id) {
        var url = 'api/ajout/showClientData.php?id=' + id;
        $.ajax({
          url : url,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          this.clientpaneldetailes = data;
          this.showClientPanel=true;
          this.ajoutdata.client.id = this.clientpaneldetailes.id;
          this.ajoutdata.client.nom = this.clientpaneldetailes.nom;
          this.ajoutdata.client.numtel = this.clientpaneldetailes.telephone;
        }.bind(this))
      },
      annulerChoixClient: function(){
        this.showClientPanel = false;
        this.clientpaneldetailes = {
          id:'',
          nom:'',
          telephone:''
        };
        this.ajoutdata.client.id = '';
      },
      //ajouter un nouveau article a la base :
      ajoutNvArticle: function(){
        this.$http.post('api/ajout/ajoutArticle.php',{
          id:this.ajoutdata.client.id,
          nom: this.ajoutdata.client.nom,
          tel: this.ajoutdata.client.numtel,
          typeid: this.ajoutdata.article.type.id,
          typeautre: this.ajoutdata.article.type.autre,
          marque: this.ajoutdata.article.marque,
          referance: this.ajoutdata.article.referance,
          remarques: this.ajoutdata.article.remarques,
          panneid: this.ajoutdata.article.panne.id,
          panneautre: this.ajoutdata.article.panne.autre
        }).then(function(resp){

          if(resp.bodyText != 'error'){
            this.showAjoutDone = true;
            console.log(resp.bodyText);
            window.open('imprimer.php?id='+resp.bodyText+'&reception','_blank');
            window.location.href = "index.php";
          }else{
            this.showAjoutDone = false;
          }
        })

      },
      // get pannes and artycle types from php-mysql api
      getTypeArticles: function(){
        this.$http.get("api/ajout/showTypeArticles.php").then(function(listeTypeArticles){
          this.listeArticles = listeTypeArticles.body;
        })
        return this.listeArticles;
      },
      getTypePannes: function(){
        this.$http.get("api/ajout/showTypePannes.php").then(function(listeTypePannes){
          this.listePannes = listeTypePannes.body;
        })
        return this.listePannes;
      },
      // 2 functions to check if user select auther to show 2 more inputs for detailes :
      checkArticleAutre: function() {
        if(event.target.value == 5){
          this.showArticleAutre = true;
        }else{
          this.showArticleAutre = false;
        }
      },
      checkPanneAutre: function() {
        if(event.target.value == 5){
          this.showPanneAutre = true;
        }else{
          this.showPanneAutre = false;
        }
      }
    }// fin methodes
});
