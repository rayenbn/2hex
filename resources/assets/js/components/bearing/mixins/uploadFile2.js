export default {
    props: {
        options: {
            type: Object,
            default: false
        },
        options2: {
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
            },
            step_options2: {
                state: this.options2.state || false,
                file: this.options2.file || null,
                selectpaid: this.options2.selectpaid || false,
                dropdisable: this.options2.dropdisable || false,
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
        },
        'step_options2.state'(val){
            this.$emit('stateChange2', val);
        },
        'step_options2.file'(val){
            this.$emit('fileChange2', val);
        },
        'step_options2.selectpaid'(val){
            this.$emit('selectpaidChange2', val);
        }
    },
    methods: {
        prepareFile(event) {
            if (event.target.files.length === 0) {
                this.step_options.file = null;
                return false;
            }
            this.$emit('prepareFile', event);

        },
        prepareFile2(event) {
            if (event.target.files.length === 0) {
                this.step_options2.file = null;
                return false;
            }
            this.$emit('prepareFile2', event);

        }
    }
}
