<template>



<div>

</div>

</template>



<script type="text/javascript">
export default {
    created(){
         localStorage.removeItem('token')
         localStorage.removeItem('user')

          Toast.fire({
               icon: 'success',
               title: 'Logout in successfully'
           })
              this.$router.push({name : '/'})      // make redirection to  login
    }
}

</script>



<style type="text/css">

</style>
