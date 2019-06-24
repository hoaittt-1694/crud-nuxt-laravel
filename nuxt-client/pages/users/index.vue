<template>
  <div class="container">
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
        <th scope="col" width='5%'>#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td width="5%">{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <nuxt-link :to="'users/' + user.id + '/edit/'" class="btn btn-primary">Edit</nuxt-link>
            <a href="#" class="btn btn-danger" @click="del(user.id)">Del</a>
          </td>
        </tr>
      </tbody>
    </table>
    <nuxt-link to="/users/create" class="btn btn-primary">Create User</nuxt-link>
  </div>
</template>

<script>
export default {
  async fetch ({ store, params }) {
    await store.dispatch('user/getUsers');
  },
  computed: {
    users () {
      return this.$store.state.user.users
    }
  },
  methods: {
    async del(id) {
      await this.$store.dispatch('user/deleteUser', id);
      this.$store.dispatch('user/getUsers');
    },
  }
}
</script>
