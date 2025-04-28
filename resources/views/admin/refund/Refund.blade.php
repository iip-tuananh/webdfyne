
<script>
    class Refund extends BaseClass {
        no_set = [];

        before(form) {
        }

        after(form) {

        }

        get submit_data() {
            let data = {
                title: this.title,
                body: this.body,
            }

            return data;
        }
    }
</script>
