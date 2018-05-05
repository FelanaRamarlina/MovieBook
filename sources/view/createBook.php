<div class="row" id="bookApp">
    <div class="col-md-6">
        <p class="book-title">Brouillon</p>
        <div class="row">
            <div class="col-md-12 px-2 py-2">
                <div class="mv-shadow px-2 py-2">
                    <p v-show="draftHint">Cliquez sur "Ajouter" pour commencer à créer votre book.</p>
                    <div v-for="element in draft" :id="element.id">
                        <p>{{ element.title }}</p>
                        <img :src="`resources/img/${element.image}`">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <p class="book-title">Liste des fiches</p>
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