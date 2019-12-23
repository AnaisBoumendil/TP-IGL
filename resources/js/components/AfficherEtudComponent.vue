<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">Quels liste souhaitez-vous afficher ?</div>
                    <div class="card-body">
                      
                      <form method="post" id="idForm"  @submit.prevent="listerEtud">
                    
                        <div class="form-group row">
                           <label for="idNiv" class="col-md-4 col-form-label text-md-right">Niveau  </label>

                           <div class="col-md-6">
                              <input type="text" v-model="niveau" id="idNiv" placeholder="Entrez le niveau" required> 
                           </div>  
                        </div> 

                        <div class="form-group row">
                           <label for="idSection" class="col-md-4 col-form-label text-md-right">Section  </label>

                           <div class="col-md-6">
                              <input type="text" v-model="section" id="idNiv" placeholder="Entrez la section" required> 
                           </div>  
                        </div> 

                        <div class="form-group row">
                           <label for="idGroupe" class="col-md-4 col-form-label text-md-right">Groupe  </label>

                           <div class="col-md-6">
                              <input type="text" v-model="groupe" id="idNiv" placeholder="Entrez le groupe" required> 
                           </div>  
                        </div> 

                        <div class="border rounded p-3 mb-4" v-for="">

                        </div>

               </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props:['eleve'],

         mounted() {
            console.log('Component mounted.')
        },

        data() {
            return{
                'niveau':'',   
                'section':'',
                'groupe':'',            
            },
        },

        methods: {
            listerEtud() {
                axios.post('afficherEtud',{
                    niveau:this.niveau,
                    section:this.section,
                    groupe:this.groupe,
                })
                console.log('afficher')
            }
        },    
    }
</script>