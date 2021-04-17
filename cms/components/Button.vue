<template>
  <div>
    <b-button
      v-if="loader == false"
      class="px-5"
      variant="primary"
      type="submit"
    >
      {{ name }}
    </b-button>
    <!-- btn loader -->
    <b-button
      v-else
      variant="primary"
      type="submit"
      class="px-3"
      :disabled="disabled"
    >
      <b-spinner small type="grow"></b-spinner>
      <span>Loading...</span>
    </b-button>
  </div>
</template>
<script>
export default {
  props: ["loader", "disabled", "name"],
};
</script>