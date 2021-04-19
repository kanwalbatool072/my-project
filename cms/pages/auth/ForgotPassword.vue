<template>
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h2 class="card-title text-center">Forgot Password</h2>
            <h6 class="text-center text-secondary">Enter your email address</h6>
            
              <form autocomplete="off" @submit.prevent="requestResetPassword" method="post" >
                <div class="form-label-group">
                  <input type="email" class="form-control" placeholder="user@example.com" required autofocus v-model="email">
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">Continue</button>
              </form>
          </div>
        </div>
      </div>
    </div>
</template>


<script>
export default {
    data() {
      return {
        email: null,
        has_error: false
      }
    },
    methods: {
        requestResetPassword() {
            this.$axios.post("auth/reset-password", {email: this.email}).then(result => {
                this.response = result.data;
                console.log(result.data);
            }, error => {
                console.error(error);
            });
        }
    }
}
</script>