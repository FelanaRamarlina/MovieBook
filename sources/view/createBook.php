<div id="notification" style="display: none">
    <p>Votre PDF à bien été créer. Vous pouvez le consulter ici:</p>
    <p><a id="linkToPdf" target="_blank">{{ bookTitle }}</a></p>
    <span v-on:click="dismissNotification">X</span>
</div>
<div class="row">
    <div class="col-md-6">
        <p class="hint-title">Brouillon</p>
        <div class="row">
            <div class="col-md-12 px-2 py-2">
                <div class="mv-shadow px-2 py-4" v-show="!draftHint">
                    <button id="control-button-send" class="control-buttons" v-on:click="createPDF">Créer le PDF</button>
                    <button id="control-button-reset" class="control-buttons" v-on:click="resetDraft">Réinitialiser</button>
                </div>
                <p v-show="draftHint">Cliquez sur "Ajouter" pour commencer à créer votre book.</p>
                <div class="mv-shadow mt-3" id="book-container">
                    <div class="title-container">
                        <input v-show="!draftHint" type="text" placeholder="titre du book" class="book-custom-title" id="bookTitle" v-on:keyup="changeTitle">
                    </div>
                    <div v-for="element in draft" :id=`sheet-id-${element.id}` class="book-row">

                        <div class="book-infos">
                            <img :src="`resources/img/${element.image}`" class="book-img" id="img1">
                            <ul class="list-infos">
                                <li><p><b>{{ element.title }}</b></p></li>
                                <li><p>Date de sortie: {{ element.date }}</p></li>
                                <li><p>Nationalité: {{ element.nationality }}</p></li>
                            </ul>
                        </div>
                        <p class="book-synopsis">{{ element.synopsis }}</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <p class="hint-title">Liste des fiches</p>
        <div class="row">
            <div class="col-md-12 px-2 py-2 sheet-search">
                <input type="text" placeholder="Rechercher une fiche" v-on:keyup="searchSheet">
            </div>
        </div>
        <div class="row">
            <div v-for="sheet in sheets" class="col-md-6 px-2 py-2" >
                <div class="mv-shadow px-2 py-2" :id="sheet.id">
                    <p class="tile-title"><b>{{ sheet.title }}</b></p>
                    <img :src=`resources/img/${sheet.image}` class="tile-img">
                    <p class="tile-title">{{ sheet.date }}</p>
                    <p class="tile-synopsis" v-on:click="showSynopsi">Voir le synopsis</p>
                    <button class="btn-add-draft" v-on:click="addToDraft">Ajouter</button>
                    <p class="tile-synopsis" style="display: none;">{{ sheet.synopsis }}</p>
                </div>
            </div>
        </div>
    </div>
</div>