<template>
    <div>
        <h2>Lista de los entrenadores</h2>
        <v-client-table 
            :data="dataTable"
            :columns="columns"
            :options="options">
        </v-client-table>
    </div>
</template>

<script>
export default {
    props: ['source', 'title'],
    mounted() {
        this.initData()
    },
    data() {
        return {
            columns: [ 'id', 'name', 'description', 'created_at', 'updated_at' ],
            dataTable: [],
            options: {
                headings: {
                    id: 'Id',
                    name: 'Nombre',
                    description: 'Descripción',
                    created_at: 'Creación',
                    updated_at: 'Última actualización'
                },
                sortable: [ 'id', 'name', 'created_at', 'updated_at' ],
                texts: {
                    filterPlaceholder: 'Filtrar',
                    filter: 'Filtro'
                },
                filterByColumn: true
            }
        }
    },
    methods: {
        initData() {
            axios
                .get(this.source)
                .then(({ data }) => {
                    const trainersData = data.model.data
                    this.dataTable = trainersData
                })
                .catch(error => console.log(error))
        }
    }
}
</script>
