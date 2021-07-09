<h1>Product List</h1>
<a type="button" class="btn btn-success" href="/products/create" style="margin-bottom: 1rem;">Add Product</a>
<form action="index.php" method="get">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo $search ?>">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) { ?>
            <tr>
                <th scope="row"><?php echo $product['id'] ?></th>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['description'] ?></td>
                <td>
                    <?php if ($product['image']) : ?>
                        <img src="../<?php echo $product['image'] ?>" alt="" style="width: 50px;">
                    <?php endif; ?>
                </td>
                <td><?php echo $product['date'] ?></td>
                <td>
                    <a href="/products/update?id=<?php echo $product['id'] ?>" type="button" class="btn btn-info btn-sm">Edit</a>
                    <form method="post" action="/products/delete" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                </td>
            </tr>
        <?php } ?>

    </tbody>
</table>