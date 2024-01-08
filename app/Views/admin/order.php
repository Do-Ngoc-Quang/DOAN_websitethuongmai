<?php

use function PHPSTORM_META\type;

$session = session(); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Contextual Classes -->

    <div class="card">
      <h3 class="card-header text-center">Đơn hàng</h3>

      <?php if (!empty($session->getFlashdata('success'))) : ?>
        <div class="alert alert-success" style="text-align: center;">
          <?= esc($session->getFlashdata('success')) ?>
        </div>
      <?php endif ?>

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th class="col-1">ID</th>
              <th class="col-2">Thông tin khách hàng</th>
              <th>Nội dung đơn hàng</th>
              <th class="col-1">Tổng tiền</th>
              <th class="col-1">Thanh toán</th>
              <th class="col-1">Trạng thái</th>
              <th class="col-1">Thao tác</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php if (!empty($order) && is_array($order)) : ?>
              <?php foreach ($order as $order_item) : ?>

                <tr class="table-default">
                  <td><i class="fab fa-sketch fa-lg text-warning me-3"></i><?= esc($order_item['id']) ?></td>
                  <td>
                    <strong><?= esc($order_item['name']) ?></strong><br>
                    <?= esc($order_item['phone_number']) ?><br>
                    <?= esc($order_item['email']) ?>
                  </td>
                  <td>
                    <?php if (!empty($order_detail) && is_array($order_detail)) : ?>
                      <?php foreach ($order_detail as $order_detail_item) : ?>
                        <?php if ($order_item['id'] == $order_detail_item['id_order']) : ?>
                          <?php foreach ($product as $product_item) : ?>
                            <?php if ($product_item['id'] == $order_detail_item['id_product']) : ?>
                              <strong><?= esc($product_item['name_product']) ?></strong> - SL: <strong><?= esc($order_detail_item['quantity']) ?></strong><br>
                            <?php endif ?>
                          <?php endforeach ?>
                        <?php endif ?>
                      <?php endforeach ?>
                    <?php endif ?>
                  </td>
                  <td>$ <?= esc($order_item['total']) ?></td>
                  <td><?= esc($order_item['method_payment']) ?></td>
                  <td style="color: <?= $order_item['status'] ? 'green' : 'orange' ?>;"><?= $order_item['status'] ? 'Đã xử lý' : 'Chưa xử lý' ?></td>
                  <td>
                    <button type="submit" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-handle-<?= esc($order_item['id']) ?>" <?= $order_item['status'] ? 'hidden' : '' ?>>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                      </svg>
                    </button>
                  </td>
                </tr>

          </tbody>

          <!-- Handle modal -->
          <div class="modal fade" id="modal-handle-<?= esc($order_item['id']) ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Xác nhận</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url('admin/order/handle_status/' . $order_item['id']) ?>" method="POST">
                  <?= csrf_field('') ?>
                  <!-- Modal body -->
                  <div class="modal-body">
                    Bạn có chắc là đã xử lý xong đơn hàng này?
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-outline-info" data-bs-dismiss="modal">Đã xử lý</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php endif ?>
      <!-- endforeach -->
        </table>
      </div>
    </div>
  </div>
  <!-- / Content -->