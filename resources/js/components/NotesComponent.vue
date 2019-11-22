
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Saisir les notes</div>
                    <div class="card-body">
                      
                        
                      <form method="post" id="idForm"  @submit.prevent="saisieNotes">
                        
                       
                        <div class="form-group row">
                           <label for="idNom" class="col-md-4 col-form-label text-md-right">Nom  </label>

                           <div class="col-md-6">
                              <input type="text" v-model="nom" id="idNom" required> 
                           </div>
                           
                        </div>

                        <div class="form-group row">
                           <label for="idPrenom" class="col-md-4 col-form-label text-md-right">Prenom  </label>

                           <div class="col-md-6">
                             <input type="text" v-model="prenom" id="idPrenom" required> 
                           </div>  
                        </div>

                        <div class="form-group row">
                          <label for="IdNoteTd" class="col-md-4 col-form-label text-md-right">Note td</label>

                          <div class="col-md-6">
                            <input type="text" v-model="noteTd" id="IdNoteTd" required> 
                          </div>  
                        </div>

                         <div class="form-group row">
                          <label for="IdNoteExam1" class="col-md-4 col-form-label text-md-right">Note examen 1</label>
                          <div class="col-md-6">
                            <input type="text" v-model="note1" id="IdNoteExam1" required> 
                          </div>  
                        </div>

                         <div class="form-group row">
                          <label for="IdNoteExam2" class="col-md-4 col-form-label text-md-right">Note examen 2</label>
                          <div class="col-md-6">
                             <input type="text" v-model="note2" id="IdNoteExam2" required> 
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
                'noteTd':'',
                'note1':'',
                'note2':'',    
                            
            }
        },

        methods: {
            saisieNotes() {
                axios.post('notes',{
                    nom: this.nom,
                    prenom:this.prenom,
                    noteTd:this.noteTd,
                    note1:this.note1,
                    note2:this.note2,
                })
                
                console.log('note inséré')
            }
        },
    }
</script>