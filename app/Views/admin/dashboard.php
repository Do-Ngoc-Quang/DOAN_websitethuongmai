<?php $session = session(); ?>

<?php if (!empty($session->getFlashdata('success'))) : ?>
    <div class="alert alert-success" style="text-align: center;">
        <?= esc($session->getFlashdata('success')) ?>
    </div>
<?php endif ?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-4 order-1">
            <div class="row">
                <?php if (!empty($category) && is_array($category)) : ?>
                    <?php foreach ($category as $category_item) : ?>
                        <div class="col-lg-2 col-md-3 col-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                    </div>
                                    <span class="fw-semibold d-block mb-1"><strong style="font-size: 20px;">
                                            <?= esc($category_item['name_category']) ?>
                                        </strong></span>
                                    <?php $quantity = 0 ?>
                                    <?php if (!empty($product) && is_array($product)) : ?>
                                        <?php foreach ($product as $product_item) : ?>
                                            <?php if ($category_item['slug'] == $product_item['slug_category']) :
                                                $quantity++;
                                            endif ?>
                                        <?php endforeach ?>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label>Số sản phẩm:</label>
                                            </div>
                                            <div class="col-md-3">
                                                <h4 class="card-title mb-2" style="color: green;">
                                                    <?= esc($quantity) ?>
                                                </h4>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>

        <div class="col-lg-12 col-md-4 order-2">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <!-- <div class="avatar flex-shrink-0">
                                    <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success"
                                        class="rounded" />
                                </div> -->
                            </div>
                            <span class="fw-semibold d-block mb-1"><strong style="font-size: 20px;">Bài
                                    viết</strong></span>
                            <div class="row">
                                <div class="col-md-9">
                                    <label>Số bài viết:</label>
                                </div>
                                <div class="col-md-3">
                                    <?php if (!empty($total_blog)) : ?>
                                        <h4 class="card-title mb-2" style="color: green;">
                                            <?= esc($total_blog) ?>
                                        </h4>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <!-- <div class="avatar flex-shrink-0">
                                    <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success"
                                        class="rounded" />
                                </div> -->
                            </div>
                            <span class="fw-semibold d-block mb-1"><strong style="font-size: 20px;">About</strong></span>
                            <div class="row">
                                <div class="col-md-9">
                                    <label>Số bài viết:</label>
                                </div>
                                <div class="col-md-3">
                                    <?php if (!empty($total_about)) : ?>
                                        <h4 class="card-title mb-2" style="color: green;">
                                            <?= esc($total_about) ?>
                                        </h4>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-4 order-3">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <!-- <div class="avatar flex-shrink-0">
                                    <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success"
                                        class="rounded" />
                                </div> -->
                            </div>
                            <span class="fw-semibold d-block mb-1"><strong style="font-size: 20px;">Liên
                                    hệ</strong></span>
                            <div class="row">
                                <div class="col-md-10">
                                    <label>Tổng số lượt liên hệ:</label>
                                </div>
                                <div class="col-md-2">
                                    <?php if (!empty($total_contact)) : ?>
                                        <h4 class="card-title mb-2" style="color: black;">
                                            <?= esc($total_contact) ?>
                                        </h4>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-10">
                                    <label>Chưa xử lý:</label>
                                </div>
                                <div class="col-md-2">
                                    <?php if (!empty($unhandle_contact)) : ?>
                                        <h4 class="card-title mb-2" style="color: orange;">
                                            <?= esc($unhandle_contact) ?>
                                        </h4>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-10">
                                    <label>Đã xử lý:</label>
                                </div>
                                <div class="col-md-2">
                                    <?php if (!empty($done_contact)) : ?>
                                        <h4 class="card-title mb-2" style="color: green;">
                                            <?= esc($done_contact) ?>
                                        </h4>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-2 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <!-- <div class="avatar flex-shrink-0">
                                    <img src="../admin/assets/img/icons/unicons/chart-success.png" alt="chart success"
                                        class="rounded" />
                                </div> -->
                            </div>
                            <span class="fw-semibold d-block mb-1"><strong style="font-size: 20px;">Đơn hàng</strong></span>
                            <div class="row">
                                <div class="col-md-9">
                                    <label>Tổng số đơn hàng:</label>
                                </div>
                                <div class="col-md-3">
                                    <?php if (!empty($total_order)) : ?>
                                        <h4 class="card-title mb-2" style="color: black;">
                                            <?= esc($total_order) ?>
                                        </h4>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-9">
                                    <label>Chưa xử lý:</label>
                                </div>
                                <div class="col-md-3">
                                    <?php if (!empty($unhandle_order)) : ?>
                                        <h4 class="card-title mb-2" style="color: orange;">
                                            <?= esc($unhandle_order) ?>
                                        </h4>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-9">
                                    <label>Đã xử lý:</label>
                                </div>
                                <div class="col-md-3">
                                    <?php if (!empty($done_order)) : ?>
                                        <h4 class="card-title mb-2" style="color: green;">
                                            <?= esc($done_order) ?>
                                        </h4>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->