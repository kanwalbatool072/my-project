<template>
  <div class="app">
    <AppHeader fixed>
      <SidebarToggler class="d-lg-none" display="md" mobile />
      <b-link class="navbar-brand" to="#">
        <img
          class="navbar-brand-full"
          src="/img/brand/logo.svg"
          width="89"
          height="25"
          alt="CoreUI Logo"
        />
        <img
          class="navbar-brand-minimized"
          src="/img/brand/sygnet.svg"
          width="30"
          height="30"
          alt="CoreUI Logo"
        />
      </b-link>
      <SidebarToggler class="d-md-down-none" display="lg" />
      <b-navbar-nav class="d-md-down-none">
        <b-nav-item class="px-3" to="/dashboard">Dashboard</b-nav-item>
        <b-nav-item class="px-3" to="/users" exact>Users</b-nav-item>
        <b-nav-item class="px-3">Settings</b-nav-item>
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <b-nav-item class="d-md-down-none">
          <i class="icon-bell"></i>
          <b-badge pill variant="danger">5</b-badge>
        </b-nav-item>
        <b-nav-item class="d-md-down-none">
          <i class="icon-list"></i>
        </b-nav-item>
        <b-nav-item class="d-md-down-none">
          <i class="icon-location-pin"></i>
        </b-nav-item>
        <AdminHeader />
      </b-navbar-nav>
      <AsideToggler class="d-none d-lg-block" />
      <!--<AsideToggler class="d-lg-none" mobile />-->
    </AppHeader>
    <div class="app-body">
      <AdminLeftSidebar />
      <main class="main">
        <Breadcrumb :list="list" />
        <div class="container-fluid">
          <router-view></router-view>
        </div>
      </main>
      <AppAside fixed>
        <!--aside-->
        <AdminRightSidebar />
      </AppAside>
    </div>
    <AdminFooter />
  </div>
</template>

<script>
import {
  Header as AppHeader,
  SidebarToggler,
  Aside as AppAside,
  AsideToggler,
  Breadcrumb,
} from "@coreui/vue";
import AdminRightSidebar from "./common/AdminRightSideBar";
import AdminLeftSidebar from "./common/AdminLeftSidebar";
import AdminHeader from "./common/AdminHeader";
import AdminFooter from "./common/AdminFooter";

export default {
  name: "Admin",
  middleware: ["unauthenticated"],
  components: {
    AsideToggler,
    AppHeader,
    AdminLeftSidebar,
    AppAside,
    AdminFooter,
    Breadcrumb,
    AdminRightSidebar,
    AdminHeader,
    SidebarToggler,
  },
  mounted() {
    console.log(this.$auth.user.role.slug);
  },
  computed: {
    name() {
      return this.$route.name;
    },
    list() {
      return this.$route.matched.filter(
        (route) => route.name || route.meta.label
      );
    },
  },
};
</script>
