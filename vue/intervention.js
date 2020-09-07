Vue.use(VueResource);
new Vue({
    el: '#vue-app',
    data: {
      ida:'',
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
          console.log(resp.bodyText);
        })
      }
    }// fin methodes
});
