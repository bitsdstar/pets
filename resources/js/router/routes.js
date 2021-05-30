const routes = [
    {
        path : '/',
        component : require('../pages/Home.vue').default,
        name : 'home' 
    },
    {
        path : '/about',
        component : require('../pages/About.vue').default,
        name : 'About' 
    },
    {
        path : '/contact',
        component : require('../pages/Contact.vue').default,
        name : "Contact" 
    },
    {
        path : '/login',
        component : require('../pages/Login.vue').default,
        name : 'Login' 
    },
    {
        path : '/register',
        component : require('../pages/Register.vue').default,
        name : 'Register' 
    }
    // {
    //     path : 'dashboard',
    //     component : import('../components/dashboard.vue'),
    //     name : 'dashboard' 
    // }
]

export default routes;