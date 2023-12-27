<?php

use function PHPSTORM_META\type;

$session = session(); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Contextual Classes -->
    <div class="card">

      <?php if (!empty($session->getFlashdata('success'))) : ?>
        <div class="alert alert-success" style="text-align: center;">
          <?= esc($session->getFlashdata('success')) ?>
        </div>
      <?php endif ?>

      <?php if (!empty($session->getFlashdata('error_invalid'))) : ?>
        <div class="alert alert-danger" style="text-align: center;">
          <?= esc($session->getFlashdata('error_invalid')) ?>
        </div>
      <?php endif ?>

      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addnew">
        Thêm mới
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
          <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z" />
          <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5" />
        </svg>
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
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug" />
                      </div>
                    </div>
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
                      <div>
                        <label for="description" class="form-label">Miêu tả</label>
                        <textarea name="description" class="form-control" rows="10"></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <?php if (!empty($category) && is_array($category)) : ?>
                        <label for="slug_category" class="form-label">Thuộc category: </label>
                        <select class="form-select" name="slug_category">
                          <option value="#" selected disabled>Chọn loại danh mục</option>
                          <?php foreach ($category as $category_item) : ?>

                            <option value="<?= esc($category_item['slug']) ?>">
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
                      <?= $product_item['slug_category'] == $category_item['slug'] ? esc($category_item['name_category']) : '' ?>
                    <?php endforeach ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit_<?= esc($product_item['id']) ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete_<?= esc($product_item['id']) ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                      </svg>
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
                                  <label for="slug" class="form-label">Slug</label>
                                  <input type="text" name="slug" class="form-control" value="<?= esc($product_item['slug']) ?>" />
                                </div>
                              </div>
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
                                <img src="<?= base_url('uploads/products/' . esc($product_item['img'])) ?>" style="width:fit-content" alt="product" />
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
                                <div>
                                  <label for="description" class="form-label">Mô tả</label>
                                  <textarea name="description" class="form-control" cols="30" rows="10"><?= esc($product_item['description']) ?></textarea>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <?php if (!empty($category) && is_array($category)) : ?>
                                  <label for="slug_category" class="form-label">Thuộc category:
                                  </label>
                                  <select class="form-select" name="slug_category">
                                    <option value="<?= esc($product_item['slug_category']) ?>" selected>
                                      <?php foreach ($category as $category_item) : ?>
                                        <?= $product_item['slug_category'] == $category_item['slug'] ? esc($category_item['name_category']) : '' ?>
                                      <?php endforeach ?>
                                    </option>
                                    <?php foreach ($category as $category_item) : ?>
                                      <option value="<?= esc($category_item['slug']) ?>">
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
                          <input type="hidden" name="type">
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