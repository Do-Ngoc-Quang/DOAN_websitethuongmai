<?php

use function PHPSTORM_META\type; ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Contextual Classes -->

    <div class="card">
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addnew">
        Thêm mới
      </button>
      <!-- Modal -->
      <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel4">Thêm sản phẩm</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo base_url('admin/product') ?>" method="POST" enctype="multipart/form-data">
              <?= csrf_field() ?>
              <div class="modal-body">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="name_product" class="form-label">Tên</label>
                        <input type="text" name="name_product" class="form-control" placeholder="Tên sản phẩm" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <input type="text" name="price" class="form-control" placeholder="Giá" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Số lượng" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-company">Ảnh sản
                        phẩm</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="file" name="img" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div>
                        <label for="detail" class="form-label">Chi tiết</label>
                        <input type="text" name="detail" class="form-control" placeholder="Chi tiết" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <?php if (!empty($category) && is_array($category)) : ?>
                        <label for="category_id" class="form-label">Thuộc category: </label>
                        <select class="form-select" name="category_id">
                          <option value="#" selected disabled>Chọn loại danh mục</option>
                          <?php foreach ($category as $category_item) : ?>

                            <option value="<?= esc($category_item['id']) ?>">
                              <?= esc($category_item['name_category']) ?>
                            </option>
                          <?php endforeach ?>

                        </select>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Đóng</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th class="col-2">Hình ảnh</th>
              <th>Chi tiết</th>
              <th>Thuộc danh mục</th>
              <th class="col-2">Tác vụ</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          <tbody>

            <?php if (!empty($product) && is_array($product)) : ?>

              <?php foreach ($product as $product_item) : ?>
                <tr>
                  <th scope="row"><?= esc($product_item['id']) ?></th>
                  <td><?= esc($product_item['name_product']) ?></td>
                  <td><?= esc($product_item['price']) ?></td>
                  <td><?= esc($product_item['quantity']) ?></td>
                  <td><img src="<?= base_url('uploads/products/' . esc($product_item['img'])) ?>" alt="product" class="d-block rounded" height="50%" width="50%" /></td>
                  <td><?= esc($product_item['detail']) ?></td>
                  <td>
                    <?php foreach ($category as $category_item) : ?>
                      <?= $product_item['category_id'] == $category_item['id'] ? esc($category_item['name_category']) : '' ?>
                    <?php endforeach ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_<?= esc($product_item['id']) ?>">
                      Chỉnh sửa
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_<?= esc($product_item['id']) ?>">
                      Xoá
                    </button>
                  </td>
                </tr>

                <!-- Modal EDIT -->
                <div class="modal fade" id="edit_<?= esc($product_item['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <form action="<?php echo base_url() ?>admin/product/update/<?= esc($product_item['id']) ?>" method="POST" enctype="multipart/form-data">
                      <?= csrf_field() ?>
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="name_product" class="form-label">Tên</label>
                                  <input type="text" name="name_product" class="form-control" value="<?= esc($product_item['name_product']) ?>" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="price" class="form-label">Giá</label>
                                  <input type="text" name="price" class="form-control" value="<?= esc($product_item['price']) ?>" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="quantity" class="form-label">Số lượng</label>
                                  <input type="text" name="quantity" class="form-control" value="<?= esc($product_item['quantity']) ?>" />
                                </div>
                              </div>
                              <div class="row">
                                <label for="quantity" class="form-label">Ảnh</label>
                                <img src="<?= base_url('uploads/products/' . esc($product_item['img'])) ?>" alt="product" />
                                <div class="col mb-3">
                                  <br>
                                  <input class="form-control" type="file" name="img" />
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div>
                                  <label for="detail" class="form-label">Chi tiết</label>
                                  <input type="text" name="detail" class="form-control" value="<?= esc($product_item['detail']) ?>" />
                                </div>
                              </div>
                              <div class="row mb-3">
                                <?php if (!empty($category) && is_array($category)) : ?>
                                  <label for="category_id" class="form-label">Thuộc category:
                                  </label>
                                  <select class="form-select" name="category_id">
                                    <option value="<?= esc($product_item['category_id']) ?>" selected disabled>
                                      <?php foreach ($category as $category_item) : ?>
                                        <?= $product_item['category_id'] == $category_item['id'] ? esc($category_item['name_category']) : '' ?>
                                      <?php endforeach ?>
                                    </option>
                                    <?php foreach ($category as $category_item) : ?>
                                      <option value="<?= esc($category_item['id']) ?>">
                                        <?= esc($category_item['name_category']) ?>
                                      </option>
                                    <?php endforeach ?>
                                  </select>
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Đóng
                          </button>
                          <input type="hidden" name="type" value="iphone">
                          <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- Modal DELETE -->
                <div class="modal fade" id="delete_<?= esc($product_item['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="<?php echo base_url('admin/product/delete/' . $product_item['id']) ?>" method="POST">
                      <?= csrf_field('') ?>
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Bạn có chắc chắn là xoá
                            sản phẩm này?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                          <button style="margin: auto;" type="submit" class="btn btn-primary">Xoá</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Contextual Classes -->
</div>
<!-- / Content -->