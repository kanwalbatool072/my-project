<template>
  <div>
    <b-form-group
      v-if="required == true"
      :id="id + '-group'"
      :label="label"
      :label-for="label"
    >
      <b-form-input
        :id="id"
        class="form-control form-control-alternative"
        :placeholder="name"
        :value="value"
        @input="updateValue"
        :state="validation"
        :aria-describedby="name + '-live-feedback'"
      ></b-form-input>

      <b-form-invalid-feedback :id="id + '-live-feedback'"
        >{{ name }} is Required.</b-form-invalid-feedback
      >
    </b-form-group>
    <b-form-group
      v-else-if="required == 'textarea'"
      :id="id + '-group'"
      :label="label"
      :label-for="label"
    >
      <b-form-textarea
        :id="id + '-textarea-rows'"
        placeholder="Tall textarea"
        :value="value"
        @input="updateValue"
        rows="5"
        class="form-control textarea form-control-alternative"
      ></b-form-textarea>
    </b-form-group>
    <b-form-group v-else :id="id + '-group'" :label="label" :label-for="label">
      <b-form-input
        :id="id"
        class="form-control form-control-alternative"
        :placeholder="name"
        autocomplete="off"
        :value="value"
        @input="updateValue"
        :aria-describedby="name + '-live-feedback'"
      ></b-form-input>
    </b-form-group>
  </div>
</template>
<script>
export default {
  name: "inputField",
  props: ["validation", "value", "name", "id", "required", "label"],

  methods: {
    updateValue(val) {
      this.$emit("input", val);
    },
  },
};
</script>
<style scoped></style>
