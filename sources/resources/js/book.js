var app = new Vue({
   el: "#bookApp",
   data: {
       sheets: [],
       draft: [],
       draftHint: true,
       bookTitle: ""
   },
    created: function() {
        fetch('http://localhost/MovieBook/api/Sheet.php', {
                method: 'GET',
                headers: {
                    Accept: 'application/json',
                },
            },
        ).then(response => {
            if (response.ok) {
                response.json().then(json => {
                    this.sheets = json;

                    for(let i = 0; i<this.sheets.length; i++) {
                        this.sheets[i].id = this.sheets[i].id - 1;
                    }
                });
            }
        });
    },
    methods: {
       display: function(event) {
           console.log(this.sheets);
       },
        showSynopsi: function(event) {
           const el = event.target.id == "" ? event.target.parentElement : event.target;
           el.lastChild.style.display = el.lastChild.style.display == "none" ? "block": "none";
        },
        addToDraft: function (event) {
            const id = event.target.parentElement.id;
            this.draft.push(this.sheets[parseInt(id)]);
            this.draftHint = false;
        }
    }
});