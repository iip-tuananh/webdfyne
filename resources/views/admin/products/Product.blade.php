@include('admin.products.ProductGallery')
<script>
    class Product extends BaseClass {
        no_set = [];
        all_categories = @json(\App\Model\Admin\Category::getForSelect());
        collection = @json(\App\Model\Admin\Category::getForSelect('collection'));

        before(form) {
          this.all_sizes = @json(\App\Model\Admin\Size::getForSelect());
        }

        after(form) {

        }

        get price() {
            return this._price ? this._price.toLocaleString('en') : '';
        }

        set price(value) {
            value = parseNumberString(value);
            this._price = value;
        }

        get base_price() {
            return this._base_price ? this._base_price.toLocaleString('en') : '';
        }

        set base_price(value) {
            value = parseNumberString(value);
            this._base_price = value;
        }

        get submit_data() {
            let data = {
                cate_id: this.cate_id,
                name: this.name,
                price: this._price,
                base_price: this._base_price,
                body: this.body,
                features: this.features,
                model_sizes: this.model_sizes,
                delivery_note: this.delivery_note,
                size_ids: this.size_ids,
                collections_ids: this.collections_ids,
                categories_special_ids: this.categories_special_ids,
            }
            return data;
        }
    }
</script>
