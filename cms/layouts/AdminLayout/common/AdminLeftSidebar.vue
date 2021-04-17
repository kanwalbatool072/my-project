<template>
  <div>
    <AppSidebar fixed>
      <SidebarHeader />
      <SidebarForm />
      <SidebarNav :navItems="nav"></SidebarNav>
      <SidebarFooter />
      <SidebarMinimizer />
    </AppSidebar>
  </div>
</template>
<script>
import nav from "@/_admin_nav";
import {
  SidebarToggler,
  Sidebar as AppSidebar,
  SidebarFooter,
  SidebarForm,
  SidebarHeader,
  SidebarMinimizer,
  SidebarNav
} from "@coreui/vue";

export default {
  mounted() {
    // console.log(nav.items);
  },
  components: {
    AppSidebar,
    SidebarForm,
    SidebarFooter,
    SidebarHeader,
    SidebarNav,
    SidebarMinimizer
  },
  data() {
    return {
      nav: nav.items
    };
  }
};
</script>
