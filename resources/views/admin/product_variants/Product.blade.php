@include('admin.product_variants.ProductGallery')
<script>
    class Product extends BaseClass {
        no_set = [];

        before(form) {
            this.all_products = @json(\App\Model\Admin\Product::getForSelect());
            this.colors = @json(\App\Model\Admin\Color::getForSelect());
            this.selectedColor = {}
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

        clearImage() {
            if (this.image) this.image.clear();
            if (this.image_back) this.image_back.clear();
        }

        get galleries() {
            return this._galleries || [];
        }

        set galleries(value) {
            this._galleries = (value || []).map(val => new ProductGallery(val, this));
        }

        addGallery(gallery) {
            if (!this._galleries) this._galleries = [];
            let new_gallery = new ProductGallery(gallery, this);
            this._galleries.push(new_gallery);
            return new_gallery;
        }

        removeGallery(index) {
            this._galleries.splice(index, 1);
        }

        get price() {
            return this._price ? this._price.toLocaleString('en') : '';
        }

        set price(value) {
            value = parseNumberString(value);
            this._price = value;
        }

        get is_default() {
            return this._is_default;
        }

        set is_default(value) {
            this._is_default = !!value;
        }

        get submit_data() {
            let data = {
                sizeQuantities: this.sizeQuantities,
                product_id: this.product_id,
                selectedColor: this.selectedColor,
                is_default: this.is_default ? 1 : 0,
            }

            data = jsonToFormData(data);
            let image = this.image.submit_data;
            if (image) data.append('image', image);

            this.galleries.forEach((g, i) => {
                if (g.id) data.append(`galleries[${i}][id]`, g.id);
                let gallery = g.image.submit_data;
                if (gallery) data.append(`galleries[${i}][image]`, gallery);
                else data.append(`galleries[${i}][image_obj]`, g.id);
            })

            return data;
        }
    }
</script>
