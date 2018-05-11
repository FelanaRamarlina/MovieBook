var app = new Vue({
   el: "#bookApp",
   data: {
       sheets: [],
       sheetsSearched: [],
       draft: [],
       draftHint: true,
       bookTitle: "",
       notif: false,
       urlBook: ""
   },
    created: function() {
        fetch('http://localhost:8888/git/MovieBook/api/Sheet.php', {
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
        dismissNotification: function() {
            document.getElementById('notification').style.display = "none";
        },
       changeTitle: function (event) {
           this.bookTitle = event.target.value;
       },
       display: function(event) {
           console.log(this.sheets);
       },
        showSynopsi: function(event) {
           const el = event.target.id == "" ? event.target.parentElement : event.target;
           el.lastChild.style.display = el.lastChild.style.display == "none" ? "block": "none";
        },
        addToDraft: function (event) {
            const id = event.target.parentElement.id;
            for(let i = 0; i < this.sheets.length; i++) {
                if(this.sheets[i].id == id) {
                    this.draft.push(this.sheets[i]);
                    this.sheets.splice(i, 1);
                }
            }
            // this.draft.push(this.sheets[parseInt(id)]);
            this.draftHint = false;
        },
        resetDraft: function() {
            this.draft = [];
            this.sheets = [];
            this.draftHint = !this.draftHint;
            fetch('http://localhost:8888/licence%20web/MovieBook/api/Sheet.php', {
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
        createPDF: function (event) {
            // Requete http à l'api
            if(this.bookTitle == "") { this.bookTitle = "Titre du book";}

            let arrayToSend = [];
            arrayToSend.push(this.draft);
            arrayToSend.push({bookTitle: this.bookTitle});
            fetch('http://localhost:8888/licence%20web/MovieBook/api/addBook.php', {
                method: 'POST',
                headers: {
                    Accept: 'application/json'
                },
                body: JSON.stringify(arrayToSend)
            }).then(function(response) {
                response.json().then(function (data) {
                    console.log(data);
                    document.getElementById('notification').style.display = "block";
                    this.urlBook = data.url_book;
                    document.getElementById('linkToPdf').href = this.urlBook;
                })
            })
        },
        searchSheet: function (event) {
           if(this.sheetsSearched.length > 0)
               this.sheets = [this.sheetsSearched, this.sheetsSearched = this.sheets][0];

           this.sheetsSearched = [];
            console.log(event.target.value);
            for(let i = 0; i < this.sheets.length; i++) {
                if(this.sheets[i].title.includes(event.target.value)) {
                    this.sheetsSearched.push(this.sheets[i]);
                }
            }

            this.sheets = [this.sheetsSearched, this.sheetsSearched = this.sheets][0];
        },
    }
});
