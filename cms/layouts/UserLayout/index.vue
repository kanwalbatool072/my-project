<template>
  <div class="app">
    <AppHeader fixed>
      <SidebarToggler class="d-lg-none" display="md" mobile />
      <!-- <b-link class="navbar-brand" to="#">
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
      </b-link> -->
      <SidebarToggler class="d-md-down-none" display="lg" />
      <b-navbar-nav class="d-md-down-none">
        <!-- <b-nav-item class="px-3" to="/dashboard">Dashboard</b-nav-item>
        <b-nav-item class="px-3" to="/users" exact>Users</b-nav-item>
        <b-nav-item class="px-3">Settings</b-nav-item> -->
        <b-nav-item href="#!" waves-fixed><b-icon class="fas fa-home"/></b-nav-item>
        <mdb-dropdown tag="li" class="nav-item">
                <mdb-dropdown-toggle tag="a" navLink color="none" slot="toggle" waves-fixed rounded>
                  {{dropdownItem}}
                </mdb-dropdown-toggle>
                <mdb-dropdown-menu>
                  <!-- <h6 class="dropdown-header">{{dropdownItem}}</h6> -->
                  <mdb-dropdown-item  v-for="item in dropdownOptions" :key="item" 
                                      v-bind:class="{'active':currentOptions === item}"
                                      v-on:click="changeOption(item)">
                      {{item}}
                  </mdb-dropdown-item>
                </mdb-dropdown-menu>
            </mdb-dropdown>
      </b-navbar-nav>

      <b-navbar-nav class="ml-auto">
        <!-- <b-nav-item class="d-md-down-none">
          <i class="icon-bell"></i>
          <b-badge pill variant="danger">5</b-badge>
        </b-nav-item>
        <b-nav-item class="d-md-down-none">
          <i class="icon-list"></i>
        </b-nav-item>
        <b-nav-item class="d-md-down-none">
          <i class="icon-location-pin"></i>
        </b-nav-item> -->
        <UserHeader />
      </b-navbar-nav>
      <!-- <AsideToggler class="d-none d-lg-block" /> -->
      <!--<AsideToggler class="d-lg-none" mobile />-->
    </AppHeader>
    <div class="app-body">
      <UserLeftSidebar />
      <main class="main">
        <Breadcrumb :list="list" />
        <div class="container-fluid">
          <router-view></router-view>
        </div>
      </main>
      <AppAside fixed>
        <!--aside-->
        <!-- <UserRightSidebar /> -->
      </AppAside>
    </div>
    <!-- <UserFooter /> -->
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
// import UserRightSidebar from "./common/UserRightSideBar";
import UserLeftSidebar from "./common/UserLeftSidebar";
import UserHeader from "./common/UserHeader";
// import UserFooter from "./common/UserFooter";

export default {
  name: "User",
  components: {
    AsideToggler,
    AppHeader,
    UserLeftSidebar,
    AppAside,
    // UserFooter,
    Breadcrumb,
    // UserRightSidebar,
    UserHeader,
    SidebarToggler,
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
