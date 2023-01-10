<template>
    <div>
        <br />

        <div class="container pa-2">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Busqueda de detalles</div>

                        <div class="card-body">
                            <div>
                                <input
                                    v-model="code"
                                    placeholder="Codigo del Producto"
                                />
                                <button class="primary" v-on:click="search">
                                    Buscar
                                </button>
                            </div>
                            <br />
                            <template v-if="info.items_details">
                                <div class="row">
                                    <h5>
                                        {{ info.name }}
                                    </h5>
                                </div>

                                <DataTable
                                    :value="info.items_details"
                                    class="p-datatable-sm"
                                >
                                    <Column
                                        field="item_types.name"
                                        header="NOMBRE"
                                    ></Column>

                                    <Column header="DETALLES">
                                        <template #body="slotProps">
                                            <div class="row">
                                                <div class="col-8">
                                                    <Dropdown
                                                        v-model="
                                                            selectedData[
                                                                slotProps.index
                                                            ]
                                                        "
                                                        :options="
                                                            slotProps.data
                                                                .item_types
                                                                .item_type_options
                                                        "
                                                        optionLabel="items.name"
                                                        :filter="true"
                                                        placeholder="Selecciona"
                                                    />
                                                </div>
                                                <div class="col-4">
                                                    <span
                                                        >{{
                                                            getData(
                                                                slotProps.data,
                                                                slotProps.index
                                                            )
                                                        }}
                                                    </span>
                                                </div>
                                            </div>
                                        </template>
                                    </Column>
                                </DataTable>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {
        this.search();
    },
    data() {
        return {
            selectedData: [],
            info: {
                name: null,
                items_details: null,
            },
            data: {
                code: null,
            },
        };
    },
    mounted() {
        this.search();
    },
    methods: {
        getData(data, index) {
            if (this.selectedData[index]) {
                let info = JSON.parse(JSON.stringify(this.selectedData[index]));

                return (
                    data.quantity +
                    " * " +
                    parseFloat(info.items.price).toFixed(2) +
                    " " +
                    info.items.unit +
                    " "
                );
            } else {
                return ".... 0.00  * 0.00 *****";
            }
        },
        search() {
            if (this.code) {
                this.data.code = this.code;
            }

            axios.post("/api/search", this.data).then((res) => {
                if (res.data.data) {
                    this.info.name = res.data.data[0].name;
                    this.info.items_details = res.data.data[0].items_details;
                }
            });
        },
    },
};
</script>
<style scoped>
.p-dropdown {
    width: 20rem;
}
</style>
