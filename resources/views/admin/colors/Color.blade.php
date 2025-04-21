<script>
    class Color extends BaseClass {
        no_set = [];

        before(form) {
        }

        after(form) {

        }

        get submit_data() {
            return {
                name: this.name,
                code: this.code,
                hex_code: this.hex_code,
            }
        }
    }
</script>
