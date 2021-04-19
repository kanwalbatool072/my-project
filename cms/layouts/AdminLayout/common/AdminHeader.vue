<template>
  <AppHeaderDropdown right style="padding-right: 20px">
    
    <template slot="header">
        <img class="rounded-circle" width="30" height="30" src="/img/avatars/IMG_301.JPG" />
    </template>
    <template slot="dropdown">
      <b-dropdown-header tag="div" class="text-center"
        ><strong>Account</strong></b-dropdown-header
      >
      <!-- <b-dropdown-item
        ><i class="fa fa-bell-o" /> Updates
        <b-badge variant="info">{{ itemsCount }}</b-badge>
      </b-dropdown-item>
      <b-dropdown-item
        ><i class="fa fa-tasks" /> Tasks
        <b-badge variant="danger">{{ itemsCount }}</b-badge>
      </b-dropdown-item>
      <b-dropdown-header tag="div" class="text-center">
        <strong>Settings</strong>
      </b-dropdown-header> -->
      <b-dropdown-item><i class="fa fa-user" /> Profile</b-dropdown-item>
      <b-dropdown-item><i class="fa fa-wrench" /> Settings</b-dropdown-item>
      <b-dropdown-divider />
      <b-dropdown-item @click="logout"
        ><i class="fa fa-lock" />Logout</b-dropdown-item
      >
    </template>
  </AppHeaderDropdown>
</template>

<script>
import { HeaderDropdown as AppHeaderDropdown } from "@coreui/vue";
export default {
  name: "Header",
  components: {
    AppHeaderDropdown,
  },
  data: () => {
    return { itemsCount: 42 };
  },
  methods: {
    async logout() {
      await this.$auth.logout();
    },
  },
};
</script>