import './bootstrap';

import {createApp} from 'vue'
import VueOnsen from 'vue-onsenui'
import * as components from 'vue-onsenui/esm/components'

import App from './App.vue'



createApp(App).mount("#app")
createApp(App).use(VueOnsen)
