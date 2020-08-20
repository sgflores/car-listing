<template>
   <div>
        <h3> Car Information Entry </h3>
        <seller-form :submitFormHandler="saveForm"></seller-form>
   </div>
</template>

<script>
import SellerForm from '../components/SellerForm';
export default {
    components: {
        SellerForm,
    },
    methods: {
        saveForm(payload) {
            this.$store.dispatch('updateIsLoading', true);
            this.$store.dispatch('save', payload)
            .then((response) => {
                // global window object @helpers.js init @app.js
                helpers.toastSaveSuccessMessage();
            })
            .catch((error) => {
                // global window object @helpers.js init @app.js
                helpers.toastBackendValidationErrors(error.response.data);
            })
            .finally(() => {
                this.$store.dispatch('updateIsLoading', false);
            });
        }
    },
    created() {

    }
}
</script>