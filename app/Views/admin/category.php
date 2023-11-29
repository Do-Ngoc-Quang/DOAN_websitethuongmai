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
        <div class="modal-dialog">
          <form action="<?php use function PHPSTORM_META\type;
          echo base_url() ?>admin/category" method="POST">
            <?= csrf_field() ?>
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm mới category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <label>Tên danh mục: </label>
                <input style="margin-left: 5px; width:60%" type="text" name="name_category"
                  placeholder="Tối thiểu 3 ký tự, tối đa 255 ký tự">

              </div>
              <div class="modal-footer">
                <button style="margin: auto;" type="submit" class="btn btn-primary">Thêm mới</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th class="col-9">Tên category</th>
              <th>Tác vụ</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          <tbody>

            <?php if (!empty($category) && is_array($category)): ?>

              <?php foreach ($category as $category_item): ?>
                <tr>
                  <th scope="row">
                    <?= esc($category_item['id']) ?>
                  </th>
                  <td style="width: 85%">
                    <?= esc($category_item['name_category']) ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                      data-bs-target="#edit_<?= esc($category_item['id']) ?>">
                      Chỉnh sửa
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                      data-bs-target="#delete_<?= esc($category_item['id']) ?>">
                      Xoá
                    </button>

                  </td>
                </tr>

                <!-- Modal EDIT -->
                <div class="modal fade" id="edit_<?= esc($category_item['id']) ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="<?php echo base_url() ?>admin/category/update/<?= esc($category_item['id']) ?>"
                      method="POST">
                      <?= csrf_field('') ?>
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <label for="">Tên: </label>
                          <input style="margin-left: 30px; width:80%" type="text" name="name_category"
                            value="<?= esc($category_item['name_category']) ?>">
                        </div>
                        <div class="modal-footer">
                          <button style="margin: auto;" type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Modal DELETE -->
                <div class="modal fade" id="delete_<?= esc($category_item['id']) ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="<?php echo base_url('admin/category/delete/' . $category_item['id']) ?>" method="POST">
                      <?= csrf_field('') ?>
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Bạn có chắc chắn là xoá
                            category này?</h1>
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
            <?php else: ?>
              <h3>No Category</h3>
              <p>Unable to find any category for you.</p>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Contextual Classes -->
</div>
<!-- / Content -->