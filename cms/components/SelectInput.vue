<template>
  <div>
    <b-form-group v-if="required == true" :label="label" :label-for="label">
      <b-form-select
        v-model="changeValue"
        :options="options"
        class="form-control form-control-alternative"
        :value-field="valueField"
        :text-field="nameField"
        size="lg"
        :state="validation"
        @change="showValue"
        :aria-describedby="name + '-live-feedback'"
      >
        <!-- This slot appears above the options from 'options' prop -->
        <template #first>
          <b-form-select-option :value="null" selected disabled
            >Please {{ label }}</b-form-select-option
          >
        </template>
      </b-form-select>
      <b-form-invalid-feedback :id="name + '-live-feedback'"
        >{{ name }} is Required.</b-form-invalid-feedback
      >
    </b-form-group>

    <!-- if validation is not required -->
    <b-form-group v-else :label="label" :label-for="label">
      <b-form-select
        v-model="changeValue"
        :options="options"
        class="form-control form-control-alternative"
        :value-field="valueField"
        :text-field="nameField"
        size="lg"
        @change="showValue"
        :aria-describedby="name + '-live-feedback'"
      >
        <!-- This slot appears above the options from 'options' prop -->
        <template #first>
          <b-form-select-option :value="null" selected disabled
            >Please {{ label }}</b-form-select-option
          >
        </template>
      </b-form-select>
    </b-form-group>
  </div>
</template>
<script>
export default {
  name: "Select-input",
  mounted() {
    // console.log(this.options);
  },
  data() {
    return {
      changeValue: null,
    };
  },
  props: {
    label: {
      type: String,
      default: "Label",
    },
    name: {
      type: String,
    },
    valueField: {
      type: String,
    },
    nameField: {
      type: String,
    },
    validation: {
      type: Boolean,
    },
    required: {
      type: Boolean,
      default: false,
    },
    options: {
      type: Array,
    },
  },
  methods: {
    showValue(val) {
      this.$emit("input", val);
    },
  },
};
</script>
