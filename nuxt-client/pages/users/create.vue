<template>
    <section class="container">
        <div class="card">
            <div class="card-header">
                Create User
            </div>
            <div class="card-body">
                <form @submit="createUser($event)">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" v-model="user.password">
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
    data() {
        return {
            user: {email: null, name: null, password: null},
        }
    },
    methods: {
        async createUser(event) {
            event.preventDefault();
            let response = await this.$store.dispatch('user/addUser', this.user);

            if (response && response.data && response.data.message) {
                this.$router.push({name: 'users'});
            } else {
                alert('Create error');
            }
        },
    }
}
</script>