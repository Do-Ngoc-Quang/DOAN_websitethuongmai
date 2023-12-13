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
              <h5 class="modal-title" id="exampleModalLabel4">Thêm bài viết</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo base_url('admin/blog') ?>" method="POST" enctype="multipart/form-data">
              <?= csrf_field() ?>
              <div class="modal-body">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" placeholder="Tiêu đề" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <!-- <input type="text" name="description" class="form-control" placeholder="Mô tả" /> -->
                        <textarea name="description" class="form-control" rows="3"></textarea>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <label for="detail" class="form-label">Chi tiết</label>
                        <!-- <input type="text" name="detail" class="form-control" placeholder="Chi tiết" /> -->
                        <textarea name="detail" class="form-control" rows="10"></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label" for="basic-default-company">Hình ảnh</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="file" name="img" />
                      </div>
                    </div>

                    <!-- Lấy mã người tạo -->
                    <?php if (isset($_SESSION['infoUser']) && isset($_SESSION['infoUser']['username'])) : ?>
                      <input type="hidden" name="auther" value="<?= $_SESSION['infoUser']['username']; ?>">
                    <?php endif; ?>

                    <div class="row mb-3">
                      <?php if (!empty($category) && is_array($category)) : ?>
                        <label for="category_id" class="form-label">Thuộc danh mục: </label>
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

                    <!-- Thẻ input hidden cho ngày tháng năm lúc tạo bài viết -->
                    <input type="hidden" name="created_at" value="<?= date('Y-m-d'); ?>">

                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tạo bài viết</button>
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
              <th>Tiêu đề</th>
              <th>Mô tả</th>
              <th>Chi tiết</th>
              <th class="col-2">Hình ảnh</th>
              <th>Người tạo</th>
              <th>Thuộc danh mục</th>
              <th>Thời gian tạo</th>
              <th class="col-2">Tác vụ</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          <tbody>

            <?php if (!empty($blog) && is_array($blog)) : ?>

              <?php foreach ($blog as $blog_item) : ?>
                <tr>
                  <th scope="row"><?= esc($blog_item['id']) ?></th>
                  <td><?= esc($blog_item['title']) ?></td>
                  <td><textarea cols="30" rows="7"><?= esc($blog_item['description']) ?></textarea></td>
                  <td><textarea cols="50" rows="7"><?= esc($blog_item['detail']) ?></textarea></td>
                  <td><img src="<?= base_url('uploads/blogs/' . esc($blog_item['img'])) ?>" alt="blog" class="d-block rounded" height="50%" width="50%" /></td>
                  <td>
                    <?php if (!empty($user) && is_array($user)) : ?>
                      <?php foreach ($user as $user_item) : ?>
                        <?php if ($blog_item['auther'] ==  $user_item['user_name']) : ?>
                          <?= esc($user_item['user_fullname']) ?>
                        <?php endif ?>
                      <?php endforeach ?>
                    <?php endif ?>
                  </td>
                  <td>
                    <?php foreach ($category as $category_item) : ?>
                      <?= $blog_item['category_id'] == $category_item['id'] ? esc($category_item['name_category']) : '' ?>
                    <?php endforeach ?>
                  </td>
                  <td><?= esc($blog_item['created_at']) ?></td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_<?= esc($blog_item['id']) ?>">
                      Chỉnh sửa
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_<?= esc($blog_item['id']) ?>">
                      Xoá
                    </button>
                  </td>
                </tr>

                <!-- Modal EDIT -->
                <div class="modal fade" id="edit_<?= esc($blog_item['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <form action="<?php echo base_url() ?>admin/blog/update/<?= esc($blog_item['id']) ?>" method="POST" enctype="multipart/form-data">
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
                                  <label for="title" class="form-label">Tiêu đề</label>
                                  <input type="text" name="title" class="form-control" value="<?= esc($blog_item['title']) ?>" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="description" class="form-label">Mô tả</label>
                                  <textarea name="description" class="form-control" cols="30" rows="10"><?= esc($blog_item['description']) ?></textarea>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="detail" class="form-label">Chi tiết</label>
                                  <textarea class="form-control" name="detail" cols="30" rows="10"><?= esc($blog_item['detail']) ?></textarea>
                                </div>
                              </div>
                              <div class="row">
                                <label for="quantity" class="form-label">Hình ảnh</label>
                                <img src="<?= base_url('uploads/blogs/' . esc($blog_item['img'])) ?>" alt="blog" />
                                <div class="col mb-3">
                                  <br>
                                  <input class="form-control" type="file" name="img" />
                                </div>
                              </div>
                              <div class="row mb-3">
                                <?php if (!empty($category) && is_array($category)) : ?>
                                  <label for="category_id" class="form-label">Thuộc category:
                                  </label>
                                  <select class="form-select" name="category_id">
                                    <option value="<?= esc($blog_item['category_id']) ?>" selected disabled>
                                      <?php foreach ($category as $category_item) : ?>
                                        <?= $blog_item['category_id'] == $category_item['id'] ? esc($category_item['name_category']) : '' ?>
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
                <div class="modal fade" id="delete_<?= esc($blog_item['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="<?php echo base_url('admin/blog/delete/' . $blog_item['id']) ?>" method="POST">
                      <?= csrf_field('') ?>
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Bạn có chắc chắn là xoá
                            bài viết này?</h1>
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