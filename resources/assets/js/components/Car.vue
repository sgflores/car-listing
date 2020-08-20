<template>
    
    <div class="card">
        <div class="card-header">
            <img v-if="car.photo" :src="uploadUrl+car.photo" alt="" width="100%">
            <img v-else :src="uploadUrl+'default.jpg'" alt="" width="100%">
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <span v-if="car.model">
                    {{car.model.name}}
                </span>
            </h5>
            <p class="card-text">
                {{car.description}}
            </p>
        </div>
    </div>
    
</template>

<script>
import constants from '../constants';
export default {
    props: {
        car: {
            required: true,
            type: Object
        },
        
    },
    data() {
        return {
            uploadUrl: constants.uploadUrl,
        }
    },
    mounted() {
        
    },
    created() {

    }
}
</script>