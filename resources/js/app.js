require("./bootstrap");

// Import modules...
import { createApp, h } from "vue";
import {
    App as InertiaApp,
    plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";

import AuthenticatedLayout from "./Layouts/Authenticated";

const el = document.getElementById("app");

import store from "./store";

const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => {
                const module = require(`./Pages/${name}`);

                if(!module.default.layout) {
                    module.default.layout = AuthenticatedLayout;
                }

                return module.default;
            },
            resolveErrors: page => (page.props.errors || {}),
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .use(store);

app.config.globalProperties.$filters = {
    truncate(value, numChars) {
        if(!value) return "";

        let str = value.substring(0, numChars).trim();
        if(numChars > value.length) {
            return str;
        } else {
            return str + "...";
        }
    }
}

import Icon from "./Shared/Icon";
app.component('Icon', Icon);

app.mount(el);

InertiaProgress.init({ color: "#4B5563" });
