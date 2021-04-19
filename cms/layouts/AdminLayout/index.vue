<template>
  <div class="app">
    <AppHeader fixed>
      <SidebarToggler class="d-lg-none" display="md" mobile />
      <b-link class="navbar-brand" to="#">
        <!-- <img
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
        /> -->
      </b-link>
      <SidebarToggler class="d-md-down-none" display="lg" />
      <b-navbar-nav class="d-md-down-none">
        <b-nav-item href="#!" waves-fixed>
        <i class="icon-home"></i></b-nav-item>

      <b-nav-item>
        <b-dropdown split v-bind:text= dropdownItem variant="none">
            <b-dropdown-item  v-for="item in dropdownOptions" :key="item" 
                                v-bind:class="{'active':currentOptions === item}"
                                v-on:click="changeOption(item)">
                {{item}}
            </b-dropdown-item>
        </b-dropdown>
      </b-nav-item>

        <!-- <b-nav-item class="px-3" to="/dashboard">Dashboard</b-nav-item>
        <b-nav-item class="px-3" to="/users" exact>Users</b-nav-item>
        <b-nav-item class="px-3">Settings</b-nav-item> -->
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">

        <AdminHeader />
      </b-navbar-nav>

    </AppHeader>
    <div class="app-body">
      <AdminLeftSidebar />
      <main class="main">
        <Breadcrumb :list="list" />
        <div class="container-fluid">
          <router-view></router-view>
        </div>
      </main>
      <!-- <AppAside fixed>
        <AdminRightSidebar />
      </AppAside> -->
    </div>
    <!-- <AdminFooter /> -->
  </div>
</template>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
import {
  Header as AppHeader,
  SidebarToggler,
  Aside as AppAside,
  AsideToggler,
  Breadcrumb,
} from "@coreui/vue";
// import AdminRightSidebar from "./common/AdminRightSideBar";
import AdminLeftSidebar from "./common/AdminLeftSidebar";
import AdminHeader from "./common/AdminHeader";
// import AdminFooter from "./common/AdminFooter";

export default {
  name: "Admin",
  middleware: ["unauthenticated"],
  components: {
    AsideToggler,
    AppHeader,
    AdminLeftSidebar,
    AppAside,
    // AdminFooter,
    Breadcrumb,
    // AdminRightSidebar,
    AdminHeader,
    SidebarToggler,
  },
    data() {
    return {
      dropdownItem: 'Home',
      currentOptions: localStorage.getItem('dropdown-item'),
      dropdownOptions: ['Home', 'Performance', 'Recruiting', 'Careers', 'Development', 'Compensation', 'Payroll', 'Reporting', 'Admin Center']
  };
},
methods: {
  changeOption(item){
    
    for(let i = 0; i <= this.dropdownOptions.length; i++){
            // this.selectedContacts.push(this.dropdownOptions[i].id);
        if(item==this.dropdownOptions[i])
        {
          this.dropdownItem = item;
        }
          
    }
}
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
