<script>
    class CategorySpecial extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
        }

        after(form) {

        }

        get highlight() {
            return this._highlight;
        }

        set highlight(value) {
            this._highlight= !!value;
        }

        get end_date() {
            return this._end_date ? moment(this._end_date).format('DD/MM/YYYY') : '';
        }

        set end_date(value) {
            this._end_date = value ? moment(value).format('YYYY-MM-DD') : '';
        }

        // Ảnh đại diện
        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);

        }

        clearImage() {
            if (this.image) this.image.clear();
        }

        get submit_data() {
            let data = {
                name: this.name,
                highlight: this.highlight ? 1 : 0,
                show_home_page: this.show_home_page,
                category_parent_id: this.category_parent_id,
            }
            data = jsonToFormData(data);

            let image = this.image.submit_data;

            if (image) data.append('image', image);

            return data;
        }
    }
</script>
