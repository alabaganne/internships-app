import { createStore } from "vuex";

export default createStore({
    state() {
			return {
				sidebarActive: true,
			};
    },
    getters: {
			sidebarActive: (state) => state.sidebarActive,
    },
    mutations: {
			toggleSidebar(state) {
				state.sidebarActive = !state.sidebarActive;
			},
			closeSidebar(state) {
				state.sidebarActive = false;
			}
    },
    actions: {
			toggleSidebar(context) {
				context.commit("toggleSidebar");
			},
			closeSidebar(context) {
				context.commit('closeSidebar');
			}
    },
});
