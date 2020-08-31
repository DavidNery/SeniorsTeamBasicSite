<div class="card">
    <div class="title">Create a product</div>
    <div class="body">
        <form action="actions/saveproduct.php" method="POST">
            <div class="form-group">
                <label for="title">Title of product</label>
                <input class="input" type="text" max-length="30" name="title" id="title"
                    placeholder="A beautiful title attracts a lot of customers" required/>
            </div>
            <div class="form-group">
                <label for="description">Description of product</label>
                <textarea class="input" name="description" id="description"
                    placeholder="How about talking a little about your product?" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price of product</label>
                <input class="input" type="number" min="0" value="0" name="price" id="price" 
                    placeholder="The price :P" required/>
            </div>
            <div class="jbetween">
                <a href="products.php">Available products</a>
                <input class="submit" type="submit" value="Save"/>
            </div>
        </form>
    </div>
</div>