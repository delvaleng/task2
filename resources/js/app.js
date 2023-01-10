require("./bootstrap");

import { createApp } from "vue";
import PostsIndex from "./components/Items/Index.vue";

import PrimeVue from "primevue/config";

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import SelectButton from 'primevue/selectbutton';
import Dropdown from 'primevue/dropdown';

// css
import 'primevue/resources/primevue.min.css'
import 'primeicons/primeicons.css'
import 'primevue/resources/themes/bootstrap4-light-blue/theme.css'

   
const app = createApp(PostsIndex)
    app.component('Column', Column)
    app.component('SelectButton', SelectButton)
    app.component('DataTable', DataTable)
    app.component('Dropdown', Dropdown)
    app.use(PrimeVue)
    app.mount("#app");
