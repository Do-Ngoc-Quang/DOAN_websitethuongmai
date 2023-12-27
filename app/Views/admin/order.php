<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Contextual Classes -->

    <div class="card">
      <h3 class="card-header text-center">Đơn hàng</h3>

      <!-- <div class="alert alert-success text-center">success</div> -->

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th class="col-1">ID</th>
              <th class="col-2">Customer information</th>
              <th>Order content</th>
              <th class="col-1">Total</th>
              <th class="col-1">Method payment</th>
              <th class="col-1">Action</th>
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
                  <td>
                    <button type="submit" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$order->id}}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                      </svg>
                    </button>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
          </tbody>

          <!-- Delete modal -->
          <div class="modal fade" id="modal-delete-{{$order->id}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Comfirm Delete</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/order-delete/{{$order->id}}" method="POST">

                  <!-- Modal body -->
                  <div class="modal-body">
                    Are you sure you want to delete this record?
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-danger" data-bs-dismiss="modal">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- endforeach -->
        </table>
      </div>
    </div>

    <!-- pagi -->

  </div>
  <!-- / Content -->