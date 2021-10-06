

<template>

	<div>

        <div class="row">
            <router-link to="/employee" class="btn btn-primary">All supplier</router-link>

        </div>
		<div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Supplier Update</h1>
                  </div>

                  <!-- without Loading that page it should  be  work -->
      <form class="user" @submit.prevent="supplierUpdate" enctype="multipart/form-data">

        <div class="form-group">

<div class="form-row">
     <div class="col-md-6">
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Full Name" v-model="form.name" required="">

     </div>

 <div class="col-md-6">
 <input type="email" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Email " v-model="form.email" required="">

      </div>

 </div>

        </div>





<div class="form-group">

<div class="form-row">
     <div class="col-md-6">
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Address" v-model="form.address" required="">

     </div>

 <div class="col-md-6">
 <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Shop Name " v-model="form.shopname" required="">

      </div>

 </div>

 </div>






 <div class="form-group">

<div class="form-row">
     <div class="col-md-6">
         <input type="number" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Phone Number" v-model="form.phone" required="">

     </div>

 <div class="col-md-6">

      </div>

 </div>
 </div>



 <div class="form-group">
<div class="form-row">
     <div class="col-md-6">
           <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected" >

           <label class="custom-file-label" for="customFile">Choose file</label>
     </div>


 <div class="col-md-6">
  <img :src="form.photo" style="height : 40px;  width : 40px">
      </div>

 </div>


 </div>






        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>

      </form>
                  <hr>
                  <div class="text-center">


                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>


</template>




<script type="text/javascript">

export default {
    created(){
        if(!User.loggedIn()){
            this.$router.push({name : 'home'})
        }
    },

    data(){
    return{
        form : {
           name : '' ,
           email : '' ,
           phone : '' ,
           shopname : '' ,
           address : '' ,
           photo : '' ,
           newphoto : '' ,  // from update

        },
       // errors:{}
    }
},

created(){

let id = this.$route.params.id
axios.get('/api/supplier/'+id)             // show method
.then(({data}) => (this.form = data))
.catch(console.log('error'))
},
methods:{
    onFileSelected(event)
    {
        let file = event.target.files[0];   // to access the photo
        if(file.size > 1048770)
        {
            Notification.image_validation()
        }
        else{
            let reader = new FileReader();
            reader.onload = event => {
                this.form.newphoto = event.target.result;
                console.log(event.target.result);

            };
            reader.readAsDataURL(file);

        }
    },
    supplierUpdate(){
        let id = this.$route.params.id
        axios.put('/api/supplier/'+id , this.form)
        .then(() => {
            this.$router.push({name : 'supplier'})
            Notification.success()
        })
        .catch(error =>this.errors = error.response.data.errors)

    }

}


}


</script>


<style type="text/css">

</style>
