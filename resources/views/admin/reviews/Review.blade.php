<script>
    class Review extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
        }

        after(form) {

        }


        get submit_data() {
            let data = {
                status: this.status,
            }

            return data;
        }
    }
</script>
