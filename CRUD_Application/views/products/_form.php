<?php if (!empty($errors)) { ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($errors as $error) {
            echo $error . '</br>';
        } ?>
    </div>
<?php } ?>

<form action="" method="post" enctype="multipart/form-data">
    <?php if (isset($product['image']) && $product['image'] != '') { ?>
        <img src="/<?php echo $product['image'] ?>" alt="" style="width: 100px;">
    <?php } ?>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" accept=".jpeg,.png,.jpg,.webp,.gif" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php if (isset($product['title'])) {
                                                                                    echo $product['title'];
                                                                                } ?>">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" value="<?php if (isset($product['price'])) {
                                                                                    echo $product['price'];
                                                                                } ?>">
    </div>
    <div class="mb-3">
        <label for="descr" class="form-label">Description</label>
        <input type="text" class="form-control" id="descr" name="description" value="<?php if (isset($product['description'])) {
                                                                                            echo $product['description'];
                                                                                        } ?>">
    </div>


    <button type="submit" class="btn btn-primary">Save</button>
    <a href="/products" class="btn btn-info">Cancel</a>
</form>