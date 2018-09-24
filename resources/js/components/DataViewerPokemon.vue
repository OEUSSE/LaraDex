<template>
    <div class="container">
        <h1>{{title}}</h1>
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
            columns: [
                "id",
                "name",
                "clasification",
                "weight",
                "height",
                "ranking",
                "type",
                "created_at",
                "updated_at"
            ],
            dataTable: [],
            options: {
                headings: {
                    id: 'Id',
                    name: 'Nombre',
                    clasification: 'Clasificación',
                    weight: 'Peso',
                    height: 'Altura',
                    ranking: 'Rango',
                    type: 'Tipo',
                    created_at: 'Creación',
                    updated_at: 'Última actualización'
                },
                texts: {
                    filter: 'Filtro',
                    filterPlaceholder: 'Filtrar'
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
                    const pokemonsData = data.model.data
                    this.dataTable = pokemonsData
                })
                .catch(error => console.log(error))
        }
    }
}
</script>

