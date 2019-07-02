<template>
    <div>
        <h2>Lista de los entrenadores</h2>
        <v-client-table 
            :data="dataTable"
            :columns="columns"
            :options="options">
        </v-client-table>
        <label for="file-0b">Test invalid input type</label>
        <div class="file-loading">
            <input id="input-id" name="file-0b" class="file" type="file" multiple data-min-file-count="1" data-theme="fas">
        </div>
    </div>
</template>

<script>
import 'bootstrap-fileinput';
import 'bootstrap-fileinput/css/fileinput.css'

export default {
    props: ['source', 'title'],
    mounted() {
        this.initData();
        $(document).on('ready', function () {
            $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
        });
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
