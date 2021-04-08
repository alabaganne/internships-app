require("./bootstrap");

// Import modules...
import { createApp, h } from "vue";
import {
    App as InertiaApp,
    plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";

const el = document.getElementById("app");

import store from "./store";

const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
            resolveErrors: page => (page.props.errors || {})
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .use(store);

app.config.globalProperties.$filters = {
    truncate(value, numWords) {
        let wordsArray = value.split(" ");
        if(wordsArray.length > numWords)
            return wordsArray.splice(0, numWords).join(" ") + "...";
        else
            return value
    }
}

app.mount(el)

InertiaProgress.init({ color: "#4B5563" });
