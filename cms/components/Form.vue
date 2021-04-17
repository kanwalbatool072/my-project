<template>
    <div>
           <b-form autocomplete="off" @submit.stop.prevent="onSubmit">
              <b-row>
                <b-col sm="4" md="4">
                  <b-form-group
                    id="employee-name-group-1"
                  >
                    <b-form-input
                      id="employee-name"
                      class="form-control form-control-alternative"
                      placeholder="Enter your Name"
                      name="employee-name"
                      v-model="$v.employeeInfo.name.$model"
                      :state="validateState('name')"
                      aria-describedby="employee-name-live-feedback"
                    ></b-form-input>

                    <b-form-invalid-feedback id="employee-name-live-feedback"
                      >This is a required field and must be at least 3
                      characters.</b-form-invalid-feedback
                    >
                  </b-form-group>
                </b-col>
                <b-col sm="4" md="4">
                  <b-form-group
                    id="employee-name-group-1"
                    label="Name"
                    label-for="employee-name"
                  >
                    <b-form-input
                      id="employee-name"
                      class="form-control form-control-alternative"
                      name="employee-name"
                      placeholder="Enter Employee Name"
                      v-model="$v.employeeInfo.name.$model"
                      :state="validateState('name')"
                      aria-describedby="employee-name-live-feedback"
                    ></b-form-input>
                  </b-form-group>
                </b-col>
                <b-col sm="4" md="4"> </b-col>
                <b-col sm="4" md="4"> </b-col>
              </b-row>
            </b-form>
    </div>
</template>