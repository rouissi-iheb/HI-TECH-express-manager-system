Vue.use(VueResource);
new Vue({
    el: '#vue-app',
    data: {
      liste:'',
      nombre:{
        totale:'',
        enattente:'',
        encours:'',
        repare:'',
        unreparable:'',
        sortie:''
      }
    },
    methods:{
    getList: function(){
      this.$http.get("api/listearticles/listearticleclient.php").then(function(res){
        this.liste = res.body;
      })
      return this.liste;
    },
    getTotale: function(){
      this.$http.get("api/listearticles/countarticles.php?totale").then(function(res){
        this.nombre.totale = res.body;
      })
      return this.nombre.totale;
    },
    getEnattente: function(){
      this.$http.get("api/listearticles/countarticles.php?enattente").then(function(res){
        this.nombre.enattente = res.body;
      })
      return this.nombre.enattente;
    },
    getEncours: function(){
      this.$http.get("api/listearticles/countarticles.php?encours").then(function(res){
        this.nombre.encours = res.body;
      })
      return this.nombre.encours;
    },
    getRepare: function(){
      this.$http.get("api/listearticles/countarticles.php?repare").then(function(res){
        this.nombre.repare = res.body;
      })
      return this.nombre.repare;
    },
    getUnreparable: function(){
      this.$http.get("api/listearticles/countarticles.php?unreparable").then(function(res){
        this.nombre.unreparable = res.body;
      })
      return this.nombre.unreparable;
    },
    getSortie: function(){
      this.$http.get("api/listearticles/countarticles.php?sortie").then(function(res){
        this.nombre.sortie = res.body;
      })
      return this.nombre.sortie;
    }
  }
});
