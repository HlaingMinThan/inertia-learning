import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'

Vue.use(plugin);

// make global ziggy route helper avaible in vue component
Vue.prototype.$route = route

const el = document.getElementById('app')

new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(el)

