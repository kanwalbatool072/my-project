<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <b-row class="justify-content-center">
        <b-col md="5">
          <b-card-group class="shadow">
            <b-card no-body class="p-4">
              <b-card-body>
                <b-form @submit.stop.prevent="handleSubmit">
                  <h1>Login</h1>
                  <p class="text-muted">Sign In to your account</p>
                  <b-input-group class="mb-3">
                    <b-input-group-prepend
                      ><b-input-group-text
                        ><i class="icon-user"></i></b-input-group-text
                    ></b-input-group-prepend>
                    <b-form-input
                      id="input-live"
                      type="text"
                      class="form-control"
                      placeholder="Enter your Email"
                      autocomplete="email"
                      v-model="$v.login.email.$model"
                      :state="validateState('email')"
                      aria-describedby="input-live-help input-live-feedback"
                      trim
                    />
                  </b-input-group>
                  <b-input-group class="mb-4">
                    <b-input-group-prepend
                      ><b-input-group-text
                        ><i class="icon-lock"></i></b-input-group-text
                    ></b-input-group-prepend>
                    <b-form-input
                      type="password"
                      class="form-control"
                      placeholder="Password"
                      autocomplete="current-password"
                      v-model="$v.login.password.$model"
                      :state="validateState('password')"
                    />
                  </b-input-group>
                  <b-row>
                    <b-col cols="6">
                      <Button
                        :loader="BtnLoader"
                        :disabled="disabled"
                        :name="BtnName"
                      />
                    </b-col>
                    <b-col cols="6" class="text-right">
                      <NuxtLink to="/auth/ForgotPassword">
                        Forgot password?
                      </NuxtLink>
                    </b-col>
                  </b-row>
                </b-form>
              </b-card-body>
            </b-card>
          </b-card-group>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
import { validationMixin } from "vuelidate";
import { required, minLength } from "vuelidate/lib/validators";
import { mapActions } from "vuex";
import Vue from "vue";
export default {
  name: "Login",
  middleware: ["authenticated"],
  layout: "Auth/index",
  mixins: [validationMixin],
  computed: {
    emailState() {
      return this.login.email == ""
        ? null
        : this.reg.test(this.login.email)
        ? true
        : false;
    },
  },
  data() {
    return {
      reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
      login: {
        email: "",
        password: "",
      },
      disabled: false,
      BtnLoader: false,
      BtnName: "Login",
    };
  },
  validations: {
    login: {
      email: {
        required,
      },
      password: {
        required,
      },
    },
  },
  methods: {
    validateState(name) {
      const { $dirty, $error } = this.$v.login[name];
      return $dirty ? !$error : null;
    },
    resetForm() {
      this.login = {
        email: null,
        password: null,
      };

      this.$nextTick(() => {
        this.$v.$reset();
      });
    },
    async handleSubmit() {
      await this.$v.login.$touch();
      if (this.$v.login.$anyError) {
        return;
      }
      this.disabled = true;
      this.BtnLoader = true;
      let resp = await this.$store.dispatch("modules/auth/handleLogin", {
        email: this.login.email,
        password: this.login.password,
      });
      if (resp.success == true) {
        if (this.$auth.user.role.slug == "super-admin" || "admin") {
          this.$toast.success(resp.msg);
        }
      } else {
        this.disabled = false;
        this.BtnLoader = false;
        this.$toast.error(resp.errors.msg);
      }
    },
  },
};
</script>
<style lang="scss" scoped>
@import "./assets/scss/custom_pages_scss/login.scss";
</style>
