import checkAuth from '@/mixins/checkAuth';

export default {
    mixins: [checkAuth],
    methods: {
        uploadFile(event , inputId = 0) {
            this.checkAuth();

            if (event.target.files.length === 0) {
                this.filePrint = null;
                
                return false;
            }

            let formData = new FormData();

            let file = event.target.files[0];

            formData.append('typeUpload', event.target.dataset.typeUpload);
            formData.append('fileName', file ? file.name : '');
            formData.append('file', file);

            let input = document.getElementById(`step-${inputId}-upload`);
            let options = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress:  progressEvent => {
                    this.uploadProgress = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                }
            };

            axios.post('/configurator-fileupload', formData, options)
                .then(response => response.data)
                .then(response => {
                    this.filePrint = response;

                    if(response != 'failed' && input){
                        input.nextElementSibling.innerHTML = response;
                        input.nextElementSibling.classList.remove("unchecked");
                        document.getElementById(`step-${inputId}-recent`).innerHTML = response;
                        this.$notify({
                            group: 'main',
                            type: 'success',
                            title: 'Upload file',
                            text: "File uploaded successfully"
                        });
                    } else {
                        input.nextElementSibling.classList.add("unchecked");
                        this.uploadProgress = 0;
                        this.$notify({
                            group: 'main',
                            type: 'error',
                            title: 'Upload file',
                            text: "File upload error"
                        });

                    }
                })
                .catch(error => {
                    input.nextElementSibling.classList.add("unchecked");
                    this.uploadProgress = 0;
                    this.filePrint = null;
                    this.$notify({
                        group: 'main',
                        type: 'error',
                        title: 'Upload file',
                        text: "File upload error"
                    });
                });
        },
    }
}
