export default {
    toastSaveSuccessMessage() {
        Toast.fire({
            icon: 'success',
            title: "Data has been successfuly saved!"
        });
    },
    toastBackendValidationErrors(response){
        //console.log(response);
        let errTitle = 'Opps!';
        if ( response.hasOwnProperty('message') ) {
            errTitle = response.message;
        }

        let errKey = null;
        if ( response.hasOwnProperty('errors') ) {
            errKey = Object.keys(response.errors)[0];
        }

        let errMsg = 'Something went wrong! Please try again';
        if ( errKey != null ) {
            errMsg = response.errors[errKey][0]
        }

        // global window instance @swal.js
        Toast.fire({
            icon: 'error',
            title: errTitle,
            text: errMsg
        });
    },
    isValidFileSize(fileSize, validSize) {
        // file size is in bytes
        // 1024 bytes is equals to 1mb
        fileSize = Math.round(fileSize / 1024)
        // less than 2mb
        if ( fileSize > validSize ) {
            Toast.fire({
                icon: 'error',
                title: 'File size must be less than ' + Math.round(validSize / 1024) + 'mb '
            });
            return false;
        }
        return true;
    },
    isValidImageType(type) {
        const validType = ['image/jpeg', 'image/jpg', 'image/png'];
        if ( validType.indexOf(type.toLowerCase()) === -1 ) {
            Toast.fire({
                icon: 'error',
                title: 'Only jpeg, jpg, png format is allowed'
            });
            return false;
        }
        return true;
    },
}