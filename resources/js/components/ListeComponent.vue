<template>
   <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card">
                    <div class="card-header">Quelle liste d'étudiants voulez-vous afficher ?</div>
                    <div class="card-body">
                       <form id="idForm"  @submit.prevent="listerEtud">
                          <div class="form-group row">
                           <label for="idNiv" class="col-md-4 col-form-label text-md-right"> Niveau  </label>

                           <div class="col-md-6">
                              <input type="text" v-model="niveau" id="idNiv" placeholder="Entrez le niveau" required>
                           </div>
                          </div>

                          
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <input type="submit" value="Lister" class="btn btn-primary">
                            </div>     
                        </div>

                       </form>
  
                    </div>
               </div>

               <div class="card">
                    <div class="card-header">Liste des étudiants:</div>
                    <div class="card-body table responsive p-0">
                      <table class="table table-hover">
                       
                         <tr>
                           <th> Nom</th>
                           <th> Prenom</th>
                           <th> E-mail</th>
                           <th> N° d'inscription</th>
                           <th> Section</th>
                           <th> Groupe </th>
                         </tr>

                         <tr v-for="e in etud">
                            <td>{{e.nom}}</td>
                            <td>{{e.prenom}}</td>
                            <td>{{e.mail}}</td>
                            <td>{{e.numIns}}</td>
                            <td>{{e.section}}</td>
                            <td>{{e.groupe}}</td>
                         </tr>
                        
                      </table>
                    </div>
                </div>    
            </div>
       </div>
   </div>
</template>

<script>
   export default {
        data() {
          return{
              'niveau':'',
              'etud' :[],
          }
        },

        created() {
            console.log('Component mounted.')
        },

        methods: {
           listerEtud() {
              axios.get('/api/liste',{
                 params:{
                    niveau:this.niveau,
                 }
              })
             .then(response => this.etud=response.data);
           }

        },

        
    }

</script>