<template>
  <div>
      Welcome Admin
      <div>
  <b-card
    title="User Management"
    img-src="/img/brand/user1.jpeg"
    img-alt="Image"
    img-top
    tag="article"
    style="max-width: 15rem"
    class="mb-2"
  >
    <b-card-text>
      Add, edit and remove User accounts and reset passwords.
    </b-card-text>

    <b-button to="/adduser" variant="primary">Add User</b-button>
    <b-button href="#" variant="primary">Edit User</b-button>
  </b-card>
</div>
  </div>
</template>

<script>
export default {
layout:"AdminLayout/index"
}
</script>

<style>

</style>