import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home.vue";
import Search from "./pages/Search.vue";
import DoctorDetail from "./pages/DoctorDetail.vue";
import Contact from "./pages/Contact.vue";
import Review from "./pages/Review.vue";

const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/search/:specSlug",
            name: "search",
            component: Search,
            props: true
        },
        {
            path: "/doctor/:slug",
            name: "detail",
            component: DoctorDetail,
            props: true
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact,
            props: true
        },
        {
            path: "/review",
            name: "review",
            component: Review,
            props: true
        }
    ]
});

export default router;
