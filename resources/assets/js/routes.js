import Vue from 'vue';
import VueRouter from 'vue-router';

import NotFound from './components/NotFound.vue';

import UsersForm from './components/UsersForm.vue';
import UsersList from './components/UsersList.vue';

Vue.use(VueRouter);

const router = new VueRouter({
	routes: [
		{ path: '/', redirect: '/users' },

        // User routes
        { path: '/users', component: UsersList},
        { path: '/users/create', component: UsersForm},
		{ path: '/users/:id/edit', component: UsersForm, meta: { mode: 'edit' }, props: true},

        // other routes
        { path: '*', component: NotFound}

	]
});

export default router;
