<template>
    <div class="avatar-upload">
        <div class="avatar-upload">
            <div class="avatar-edit">
                <input type='file' id="photo" name="photo" accept=".png, .jpg, .jpeg" @change="onFileChange" />
                <label for="photo"></label>
            </div>
            <div class="avatar-preview">
                <div id="imagePreview" style="background-image: url();"></div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        uploadLocation: {
            required: true,
            type: String
        },
        photo: {
           required: true,
        },
        updatePhotoHandler: {
            type: Function,
            required: true,
        }
    },
    computed: {

    },
    methods: {
        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) {
                return;
            }
            let file = files[0];
            // 2048 = 2MB
            if (!helpers.isValidFileSize(file.size, 2048)) {
                document.getElementById('photo').value = '';    
                return;
            }

            if(!helpers.isValidImageType(file.type)) {
                document.getElementById('photo').value = '';
                return;
            }

            this.createImage(file);
        },
        createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
                this.updatePhotoHandler(e.target.result);
            };
            reader.readAsDataURL(file);
        },
    }
}
</script>