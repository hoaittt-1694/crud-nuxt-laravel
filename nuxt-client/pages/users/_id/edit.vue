<template>
    <section class="container">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <form @submit="updateUser($event)">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" v-model="userData.name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" v-model="userData.email">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <nuxt-link to="/users" class="btn btn-primary">Cancel</nuxt-link>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    async fetch ({ store, route }) { 
       await store.dispatch('user/getUser', route.params.id);
    },
    data() {
        return {
            userData: {...this.$store.state.user.user},
        }
    },
    methods: {
        async updateUser(event) {
            event.preventDefault();
            let response = await this.$store.dispatch('user/editUser', this.userData);

            if (response && response.data && response.data.message) {
                this.$router.push({name: 'users'});
            } else {
                alert('Update error');
            }
        },
    }
}
</script>