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
                        <textarea name="description" class="form-control" rows="3"></textarea>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <label for="detail" class="form-label">Chi tiết</label>
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
              <th>Danh mục</th>
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
                  <td><textarea cols="30" rows="7" readonly><?= esc($blog_item['description']) ?></textarea></td>
                  <td><textarea cols="50" rows="7" readonly><?= esc($blog_item['detail']) ?></textarea></td>
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
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit_<?= esc($blog_item['id']) ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete_<?= esc($blog_item['id']) ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                      </svg>
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
                                  <label for="category_id" class="form-label">Thuộc category:</label>
                                  <select class="form-select" name="category_id">
                                    <?php if (isset($blog_item['category_id'])) : ?>
                                      <!-- Giữ nguyên giá trị khi đã có giá trị category_id -->
                                      <option value="<?= esc($blog_item['category_id']) ?>" selected>
                                        <?php foreach ($category as $category_item) : ?>
                                          <?= $blog_item['category_id'] == $category_item['id'] ? esc($category_item['name_category']) : '' ?>
                                        <?php endforeach ?>
                                      </option>
                                    <?php endif ?>
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
                          <!-- <input type="hidden" name="type" value=""> -->
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