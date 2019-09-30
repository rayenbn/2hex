export default {
    methods: {
        checkAuth(signed = 0, redirert_uri = '/login') {
            if(document.body.getAttribute('signed') == signed){
                swal({
                    title: "",
                    text: "You need to login to upload file",
                    type: "warning",
                    confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                }).then((value) => {
                    window.location.href = redirert_uri;
                });

                return;
            }
        },
    }
}
