<template>
  <div></div>
</template>

<script>
export default {
  mounted() {
    this.$router.push("/auth/login");
  },
};
</script>

<style>
/* IE fix */
#card-chart-01,
#card-chart-02 {
  width: 100% !important;
}
</style>
