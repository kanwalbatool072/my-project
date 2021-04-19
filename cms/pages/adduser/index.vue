<template>

  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
        id="input-group-1"
        label="First Name:"
        label-for="input-1"
        
      >
        <b-form-input
          id="input-1"
          v-model="form.fstname"
          type="text"
          placeholder="Enter First Name"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Last Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.lstname"
          placeholder="Enter Last Name"
          required
        ></b-form-input>
      </b-form-group>
      <b-form-group
        id="input-group-3"
        label="Email address:"
        label-for="input-3"
        description="We'll never share your email with anyone else."
      >
        <b-form-input
          id="input-3"
          v-model="form.email"
          type="email"
          placeholder="Enter email"
          required
        ></b-form-input>
      </b-form-group>
       <b-form-group
        id="input-group-4"
        label="Set Password:"
        label-for="input-4"
        
      >
        <b-form-input
          id="input-4"
          v-model="form.password"
          type="text"
          placeholder="set Password"
          required
        ></b-form-input>
      </b-form-group>

<br><br>
      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
    
  </div>
</template>

<script>
  export default {
    layout:"AdminLayout/index",
    data() {
      return {
        form: {
          fstname: '',
          lstname: '',
          email:'',
          password:'',
          
        },
        
        Groups: ['HR', 'Manager', 'Employee', 'Admin'],
        show: true,
        options: ['edit', 'deleting', 'addroles', 'attendance', 'createuser', 'addjob', 'assigntask'],
        search: '',
        value: []
      }
    },
    
    methods: {
       
      onSubmit(event) {
        event.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(event) {
        event.preventDefault()
        // Reset our form values
        this.form.fstname = ''
        this.form.lstname = ''
        this.form.email = ''
         this.form.password = ''
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>