import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from "./views/Index";
import Note from "./views/Note"

const routes = [
    {
        path: "/",
        component: Index
    },
    {
        path: "/note",
        component: Note
    },
];

export default new vueRouter({
    mode: "history",
    routes: routes
});