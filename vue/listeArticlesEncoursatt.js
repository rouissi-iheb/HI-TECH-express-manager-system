Vue.use(VueResource);
new Vue({
    el: '#vue-app',
    data: {
      liste:''
    },
    methods:{
    getList: function(){
      this.$http.get("api/listearticles/listeArticlesFiltred.php?filter=encours").then(function(res){
        this.liste = res.body;
      })
      return this.liste;
    }
  }
});
