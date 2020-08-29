import Home from '../pages/Home.vue';
import Login from '../pages/Login.vue';
import Dashboard from '../pages/Dashboard.vue';

export default {
	mode: 'history',
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home
		},
		{
			path: '/login',
			name: 'login',
			component: Login
		},
		{
			path: '/dashboard',
			name: '',
			component: Dashboard
		}
	]
};
