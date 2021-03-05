<template>
   <div>
       <h4 class="mb-3">ADRESSE DE DOMICILE</h4>
       <form class="needs-validation" :action="route" method="post">
           <input type="hidden" name="_token" :value="token">
           <div class="row">
               <div class="col-md-6 mb-3">
                   <label for="firstName">PRENOM</label>
                   <input type="text" class="form-control" :class="{'is-invalid':errors.first_name}" v-model="info.first_name" name="first_name" id="firstName" placeholder="PRENOM ..."  required>
                    <div v-if="errors.first_name" class="invalid-feedback">{{errors.first_name[0]}}</div>
               </div>
               <div class="col-md-6 mb-3">
                   <label for="lastName">NOM</label>
                   <input type="text" name="last_name" :class="{'is-invalid':errors.last_name}" v-model="info.last_name" class="form-control " id="lastName" placeholder="NOM ..." required>
                   <div v-if="errors.last_name" class="invalid-feedback">{{errors.last_name[0]}}</div>
               </div>
           </div>

           <div class="mb-3">
               <label for="email">Email <span class="text-muted">(Optional)</span></label>
               <input type="email" name="email" :class="{'is-invalid':errors.last_name}" v-model="info.email" class="form-control" id="email"  placeholder="example@example.com">
               <div v-if="errors.email" class="invalid-feedback">{{errors.email[0]}}</div>
           </div>
           <div class="mb-3">
               <label for="phone">numéro de telephone</label>
               <input type="text" class="form-control" :class="{'is-invalid':errors.phone}"  v-model="info.phone" name="phone" id="phone" placeholder="0675XXXXXX" required>
               <div v-if="errors.phone" class="invalid-feedback">{{errors.phone[0]}}</div>

           </div>
           <div class="mb-3">
               <label for="address">Addresse de livraison</label>
               <input type="text" class="form-control" v-model="info.address" :class="{'is-invalid':errors.address}"  id="address" name="address" placeholder="cité bossouf, Constantine...." required>
               <div v-if="errors.address" class="invalid-feedback">{{errors.address[0]}}</div>
           </div>
           <div class="row">
               <div class="col-md-6 mb-3 form-group">
                   <label for="cities">City</label>
                   <select name="city" id="cities" class="form-control" @change="changeHandle()" v-model="info.city" required>
                       <option  value="-1" disabled selected >Select Your City...</option>
                       <option v-for="c in cities" :value="c.name" :key="c.id" >{{c.name}} ({{ c.name_ar }})</option>
                   </select>

               </div>
               <div class="col-md-6 mb-3 form-group">
                   <label for="provinces">Province</label>
                   <select name="province" id="provinces" class="form-control" v-model="info.province" required>
                       <option value="-1"  selected disabled>Select Your City...</option>
                       <option :value="p.name" v-for="p in provinces" :key="p.id">{{ p.name }} ({{p.name_ar}})</option>

                   </select>
               </div>
           </div>

           <hr class="mb-4">

           <button class="btn btn-primary btn-lg btn-block text-center" :disabled="!isDisabled" type="submit">Valider</button>
       </form>
   </div>
</template>

<script>
    export default {
        props:{
            route:{
                required:true
            },
            token:{
                required:true
            },
            errors:{
                required: true
            },
            cities:{
                required: true
            }
        },
        data(){
            return {
                provinces:[],
                info: {
                    first_name:'',
                    last_name:'',
                    email:'',
                    address:'',
                    phone:'',
                    city:'',
                    province:'',
                }
            }
        },
        computed:{
            isDisabled(){
                if (!this.info.first_name){
                    return false;
                }
                if (!this.info.last_name){
                    return false;
                }
                if (!this.info.address){
                    return false;
                }
                if (!this.info.phone){
                    return false;
                }
                if (!this.info.city){
                    return false;
                }
                if (!this.info.province){
                    return false;
                }
                return true;
            }
        },

        methods:{
            changeHandle(){
                this.info.province = '',
                this.provinces = this.cities.filter(v => v.name === this.info.city)[0].dairas
            }
        },
    }
</script>
