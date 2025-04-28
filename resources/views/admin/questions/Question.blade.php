<script>
    class Question extends BaseClass {
        no_set = [];

        before(form) {
        }

        after(form) {

        }

        get submit_data() {
            return {
                title: this.title,
                topic_id: this.topic_id,
                content: this.content,
            }

        }
    }
</script>
