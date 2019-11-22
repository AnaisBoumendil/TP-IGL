<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">Inscrire l'étudiant</div>
                    <div class="card-body">
                      
                      <form method="post" id="idForm"  @submit.prevent="inscrireEtud">
                       
                       
                        <div class="form-group row">
                           <label for="idNom" class="col-md-4 col-form-label text-md-right">Nom  </label>

                           <div class="col-md-6">
                             <input type="text" v-model="nom" id="idNom"> 
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="idPrenom" class="col-md-4 col-form-label text-md-right">Prenom  </label>

                           <div class="col-md-6">
                             <input type="text" v-model="prenom" id="idPrenom"> 
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="idF" class="col-md-4 col-form-label text-md-right"> Fille  </label>
                           <input type="radio"  name="choix" id="idF"> 
                        
                           <label for="idG" class="col-md-2 col-form-label text-md-right"> Garçon  </label>
                           <input type="radio"  name="choix" id="idG"> 
                        </div>

                        <div class="form-group row">
                           <label for="idDateNaiss" class="col-md-4 col-form-label text-md-right">Date de naissance  </label>

                           <div class="col-md-4">
                             <input type="date" v-model="dateNaiss"  id="idDateNaiss"> 
                           </div>  
                        </div>

                        <div class="form-group row">
                           <label for="idLieuNaiss" class="col-md-4 col-form-label text-md-right">Lieu de naissance  </label>

                           <div class="col-md-6">
                              <input type="text" v-model="lieuNaiss" id="idLieuNaiss"> 
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="idAdr" class="col-md-4 col-form-label text-md-right"> Adresse  </label>

                           <div class="col-md-6">
                             <input type="text" v-model="adr" id="idAdr"> 
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="idMail" class="col-md-4 col-form-label text-md-right"> Adresse e mail </label>

                           <div class="col-md-6">
                             <input type="email" v-model="mail" id="idMail"> 
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="idNumIns" class="col-md-4 col-form-label text-md-right"> Numéro d'inscription  </label>

                           <div class="col-md-6">
                             <input type="text" v-model="numIns" id="idNumIns"> 
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="idNiv" class="col-md-4 col-form-label text-md-right"> Niveau  </label>

                           <div class="col-md-6">
                             <input type="text" v-model="niveau" id="idNiv">
                           </div>
                        </div>

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                               <input type="submit" value="inscrire" class="btn btn-primary">
                            </div>  
                         </div>
                         
                      
                      </form>  

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data() {
            return{
                'nom': '',
                'prenom': '',
                'dateNaiss':'',
                'lieuNaiss': '',
                'adr':'',
                'numIns':'',
                'mail':'',
                'niveau':'',               
            }
        },

        methods: {
            inscrireEtud() {
                axios.post('inscrire',{
                    nom: this.nom,
                    prenom:this.prenom,
                    dateNaiss:this.dateNaiss,
                    lieuNaiss:this.lieuNaiss,
                    adr:this.adr,
                    numIns:this.numIns,
                    mail:this.mail,
                    niveau:this.niveau,

                })


                console.log('inscrit')
            }
        },
    }
</script>

