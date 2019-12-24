<template>
   <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card">
                    <div class="card-header">Quels liste d'étudiants voulais-vouz affichez ?</div>
                    <div class="card-body">
                      <ul>
                         <li v-for="e in etud">{{e.nom}}</li>
                      </ul> 
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
              'etud' :[],
          }
        },

        created() {
            axios.get('/api/liste')
             .then(response => this.etud=response.data);
        },

        
    }

</script>