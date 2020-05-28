export default {
    props: {
        options: {
            type: Object,
            default: false
        },
        files: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            step_options: {
                state: this.options.state || false,
                file: this.options.file || null,
                selectpaid: this.options.selectpaid || false,
                dropdisable: this.options.dropdisable || false,
            }
        }
    },
    watch: {
        'step_options.state'(val){
            this.$emit('stateChange', val);
        },
        'step_options.file'(val){
            this.$emit('fileChange', val);
        },
        'step_options.selectpaid'(val){
            this.$emit('selectpaidChange', val);
        }
    },
    methods: {
        prepareFile(event) {
            if (event.target.files.length === 0) {
                this.step_options.file = null;
                return false;
            }
            this.$emit('prepareFile', event);

        }
    }
}
