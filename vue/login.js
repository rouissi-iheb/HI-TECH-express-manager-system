Vue.use(VueResource);
new Vue({
    el: '#vue-app',
    data: {
      user:'',
      pass:'',
      showError:false
    },
    methods:{
      login: function(){
        this.$http.post('api/login/login.php',{
          user:this.user,
          pass: this.pass
        }).then(function(resp){
          if(resp.bodyText == 'connected'){
            window.location="index.php";
          }else{
            this.showError = true;
          }
          console.log(resp.bodyText);
        })

      }
  }
});
