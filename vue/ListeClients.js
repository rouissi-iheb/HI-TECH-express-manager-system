Vue.use(VueResource);
new Vue({
    el: '#vue-app',
    data: {
      listClients:[],
      data:''
    },
      methods:{
      },
        mounted:function(){
          var url = 'api/listeclients/listeclients.php';
          $.ajax({
            url : url,
            type: 'GET',
            dataType: 'json',
          })
          .done(function(data) {
            this.listClients = data;
          }.bind(this))
        }
    // fin methodes
});
