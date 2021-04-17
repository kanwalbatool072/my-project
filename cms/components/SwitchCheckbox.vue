<template>
  <b-form-group :label="name" :label-for="name">
    <b-form-checkbox
      :value="value"
      @input="updateValue"
      name="check-button"
      switch
    >
      <b>(Checked: {{ value }})</b>
    </b-form-checkbox>
  </b-form-group>
</template>
<script>
export default {
  props: {
    value: {
      type: Boolean,
      default: false
    },
    name: {
      type: String,
      default: ""
    }
  },
  methods: {
    updateValue(val) {
      console.log(val);
      this.$emit("input", val);
    }
  }
};
</script>
