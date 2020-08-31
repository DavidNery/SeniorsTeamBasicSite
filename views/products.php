<div class="card">
    <div class="title">Available products</div>
    <div class="body" id="products">
        Loading products...
    </div>
</div>

<script>

    const products = $("#products");

    $.get('components/product.html', {}, function(productcomponent) {
        products.html('');
        $.get('actions/products.php', {}, function(response) {
            for(const index in response) {
                const product = response[index];
                const title = product.title;
                const description = product.description;
                const price = product.price;

                const currentProduct = $(productcomponent);

                const values = currentProduct.find('.value');
                $(values[0]).html(title);
                $(values[1]).html(description);
                $(values[2]).html(`\$${price}`);

                products.append(currentProduct);
            }
        }, 'json');
    }, 'text');

</script>