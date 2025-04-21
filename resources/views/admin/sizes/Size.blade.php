<script>
    class Size extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
        }

        after(form) {

        }

        get submit_data() {
            return {
                name: this.name,
            }
        }
    }
</script>
