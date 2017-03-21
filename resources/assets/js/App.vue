

<template>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h2>Users</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.address}}</td>
                        <td>{{user.created_at}}</td>
                        <td>{{user.updated_at}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

</template>

<script>

export default {
    data() {
            return {
                users: {}
            }
        },
    methods: {
        fetchData() {
            axios.get('/users')
                .then((response) => {
                    this.users = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    },
    created() {
        this.fetchData();
    }
}

</script>
