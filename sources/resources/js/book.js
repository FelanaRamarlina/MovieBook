var app = new Vue({
   el: "#bookApp",
   data: {
       sheets: []
   },
    created: function() {
        fetch('http://localhost/MovieBook/api/Sheet.php').then(function(response) {
            this.sheets = response;
        });
    },
    methods: {
       display: function(event) {
           console.log(JSON.stringify(this.sheets));
       }
    }
});