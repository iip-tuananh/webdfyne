
<script>
    class About extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
        }

        after(form) {

        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        get submit_data() {
            let data = {
                body: this.body,
            }

            data = jsonToFormData(data);

            let image = this.image.submit_data;

            if (image) data.append('image', image);

            return data;
        }
    }
</script>
