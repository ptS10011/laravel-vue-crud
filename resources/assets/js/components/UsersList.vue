<style lang="scss" scoped>

.operations-column {
    min-width: 100px;
}

</style>

<template>

<div class="row">
    <div class="col-md-12">
        <h2>Users
            <router-link :to="addUrl" class="btn btn-default pull-right">
                <i class="fa fa-plus" aria-hidden="true"></i> Add new
            </router-link>
        </h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th class="operations-column"></th>
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
                    <td>
                        <router-link :to="'/users/' + user.id + '/edit'" class="btn btn-primary pull-center">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </router-link>
                        <button class="btn btn-danger pull-center" @click="deleteUser(user.id)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</template>

<script>
import swal from 'sweetalert2'

export default {
    data() {
        return {
            addUrl: '/users/create',
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
            },
        deleteUser(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(() => {
                axios.delete('/users/' + id)
                    .then(() => {
                        this.fetchData();
                        swal(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        )
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            })

        }
    },
    created() {
        this.fetchData();
    }
}

</script>
