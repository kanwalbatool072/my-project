<template>
  <div>
    <TheFooter>
      <!--footer-->
      <div>
        <a href="https://coreui.io">Erp SignIn Tribe</a>
        <span class="ml-1">&copy; 2020 SignInTribe.</span>
      </div>
      <div class="ml-auto">
        <span class="mr-1">Powered by</span>
        <a href="https://coreui.io">Sign In Tribe</a>
      </div>
    </TheFooter>
  </div>
</template>
<script>
import { Footer as TheFooter } from "@coreui/vue";
export default {
  components: {
    TheFooter,
  },
};
</script>