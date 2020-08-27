<template>
    <!--vld-parent = vue-loading-overlay plugin-->
    <div class="card vld-parent">
        <vue-loader></vue-loader>
        <div class="card-body">
                
            <form @submit.prevent="submitForm" autocomplete="off">

                <div class="row">
                    <div class="col-md-9">
                                
                        <div class="form-group">
                            <label for="make_id">Make <required-label></required-label> </label>
                            <br>
                            <input-auto-complete 
                                :className="'form-control '+($v.car.make_id.$error ? 'is-invalid' : '')"
                                :value="$v.car.make_id.$model"
                                id="make_id"  name="make_id"
                                placeholder="Enter Make..."
                                :options="makeOptions"
                                :updateValueHandler="(val) => { car.make_id = val; }"></input-auto-complete>
                        </div>

                        <div class="form-group">
                            <label for="model_id">Model <required-label></required-label> </label>
                            <br>
                            <input-auto-complete 
                                :className="'form-control '+($v.car.model_id.$error ? 'is-invalid' : '')"
                                :value="$v.car.model_id.$model"
                                id="model_id"  name="model_id"
                                placeholder="Enter Model..."
                                :options="modelOptions"
                                :updateValueHandler="(val) => { car.model_id = val; }"></input-auto-complete>
                        </div>

                        <div class="form-group">
                            <label for="year">Year <required-label></required-label> </label>
                            <input type="text" class="form-control" 
                                id="year" name="year" 
                                v-model="$v.car.year.$model"
                                :class="{'is-invalid': $v.car.year.$error}"
                                placeholder="Enter Year">
                        </div>

                        <div class="form-group">
                            <label for="price">Price <required-label></required-label> </label>
                            <input type="text" class="form-control" 
                                id="price" name="price" 
                                v-model="$v.car.price.$model"
                                :class="{'is-invalid': $v.car.price.$error}"
                                placeholder="Enter Price">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control"
                                v-model="$v.car.description.$model"
                                name="description" id="" cols="20" rows="5"></textarea>
                        </div>

                        <div class="">
                            <div class="float-right">
                                <button type="button" class="btn btn-danger" @click="cancel">Cancel</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3 order-first">
                        <image-upload :photo="car.photo" :updatePhotoHandler="updatePhoto" 
                            uploadLocation="/img/uploads/"
                        ></image-upload>
                    </div>
                </div>

            </form>

        </div>

    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { required, integer, numeric } from 'vuelidate/lib/validators';
import  InputAutoComplete  from  'vue-input-autocomplete';
export default {
    components: {
        InputAutoComplete
    },
    props: {
        submitFormHandler: {
            type: Function,
            required: true,
        }
    },
    validations: {
        car: {
            make_id: {
                required,
            },
            model_id: {
                required,
            },
            year: {
                required,
            },
            price: {
                required,
                numeric,
            },
            description: {

            },
            photo: {

            },
        }
    },
    computed: {
        ...mapGetters({
            'car': 'car',
        }),
    },
    data() {
        return {
            makeOptions: [],
            modelOptions: [],
        }
    },
    methods: {
        cancel() {
            document.getElementById('photo').value = '';
            $('#imagePreview').css('background-image', 'url()');
            this.$router.push('/');
        },
        submitForm() {
            // trigger vuelidate
            this.$v.$touch();
            if (this.$v.$invalid) {
                return;
            }

            this.$v.$reset();
            this.submitFormHandler(this.car);
            
        },
        updatePhoto(filename) {
            this.car.photo = filename;
        },
        loadDependencies() {
            let payload = {
                models: [
                    {
                        name: 'Repository', 
                        filters: {
                            'type': 'make'
                        }
                    },
                    {
                        name: 'Repository', 
                        filters: {
                            'type': 'model'
                        }
                    }
                ]
            };

            this.$store.dispatch('updateIsLoading', true);
            this.$store.dispatch('loadDependencies', payload)
            .then((response) => {
                // console.log(response);
                this.makeOptions = _.map(response.data[0] , 'name');
                this.modelOptions = _.map(response.data[1] , 'name');
                // console.log(this.makeOptions);
                // console.log(this.modelOptions);
            })
            .catch((error) => {
                console.log(error);
            })
            .finally(() => {
                this.$store.dispatch('updateIsLoading', false);
            });
        }
    },
    created() {
        // initialze car model
        this.$store.dispatch('setCar');
        this.loadDependencies();
    }
}
</script>