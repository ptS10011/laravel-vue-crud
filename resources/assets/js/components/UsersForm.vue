<template lang="html">
    <div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading clearfix">
					<h3 class="panel-title pull-left">{{ title }}</h3>
				</div>
				<div class="panel-body">
					<form>
					  <div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" placeholder="Imie" v-model="user.name">
					  </div>
					  <div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" placeholder="Email" v-model="user.email">
					  </div>
					  <div class="form-group">
						<label for="address">Address</label>
						<textarea class="form-control" id="address" placeholder="Adress" v-model="user.address"></textarea>
					  </div>
					  <button class="btn btn-success" @click.prevent="save">Zapisz</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import swal from 'sweetalert2'

export default {
    props: ['id'],
    data() {
        return {
            user: {},
            mode: 'store',
            title: 'Add new user',
            redirect: '/users'
        }
    },
    methods: {
		fetchData () {
            axios.get('/users/' + this.id)
                .then((response) => {
                    this.user = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
		},
        save () {
            if (this.mode === 'store') {
                axios.post('/users', this.user)
                    .then((response) => {
                        this.$router.push(this.redirect);
                    })
                    .catch((errors) => {
                        this.handleErrors()
                    });
            } else if (this.mode === 'edit') {
                axios.put('/users/' + this.id, this.user)
                    .then((response) => {
                        this.$router.push(this.redirect);
                    })
                    .catch((errors) => {
                        this.handleErrors()
                    });
            }
        },
        handleErrors () {
            swal(
                'Oops...',
                'Something went wrong!',
                'error'
            )
        }
    },
	beforeMount () {
    	if(this.$route.meta.mode === 'edit') {
    		this.mode = 'edit';
    		this.title = 'Edit user';

    		this.fetchData();
    	}
    },
}
</script>

<style lang="css">
</style>
