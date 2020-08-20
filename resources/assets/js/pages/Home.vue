<template>
    <div class="vld-parent">
        <vue-loader></vue-loader>

        <h3> Car Home Page </h3>
        <div class="form-group">
            <label for="make_id"></label>
            <select name="make_id" class="custom-select" v-model="filters.make_id" @change="loadCars">
                <option selected value="all">All Model</option>
                <option :value="list.id" v-for="list in makeOptions" :key="list.id">
                    {{list.name}}
                </option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-4" v-for="list in cars" :key="list.id">
                <Car :car="list" />
            </div>
        </div>

    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Car from '../components/Car';
export default {
    components: {
        Car
    },
    computed: {
        ...mapGetters({
            'cars': 'cars',
        }),
    },
    data() {
        return {
            makeOptions: [],
            filters: {
                make_id: 'all',
            }
        }
    },
    methods: {
        loadDependencies() {
            let payload = {
                models: [
                    {
                        name: 'Repository', 
                        filters: {
                            'type': 'make'
                        }
                    },
                ]
            };
            
            this.$store.dispatch('updateIsLoading', true);
            this.$store.dispatch('loadDependencies', payload)
            .then((response) => {
                this.makeOptions = response.data[0];
            })
            .catch((error) => {
                console.log(error);
            })
            .finally(() => {
                this.$store.dispatch('updateIsLoading', false);
                this.loadCars();
            });
        },
        loadCars() {
            let payload = {
                make_id: this.filters.make_id == 'all' ? null : this.filters.make_id
            };
            this.$store.dispatch('updateIsLoading', true);
            this.$store.dispatch('all', payload)
            .then((response) => {
                // console.log(this.cars);
            })
            .catch((error) => {
                console.log(error);
            })
            .finally(() => {
                this.$store.dispatch('updateIsLoading', false);
            });
        }
    },
    mounted() {

    },
    created() {
        this.loadDependencies();
    }
}
</script>