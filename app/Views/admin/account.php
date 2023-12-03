<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <h5 class="card-header">Chi tiết hồ sơ</h5>
                    <!-- Account -->
                    <?php if (!empty($user) && is_array($user)) : ?>
                        <?php foreach ($user as $user_item) : ?>
                            <?php if ($_SESSION['infoUser']['username'] == $user_item['user_name']) : ?>
                                <form action="<?php echo base_url() ?>admin/account/update/<?= esc($user_item['id']) ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="<?= base_url('uploads/avatars/' . esc($user_item['user_avatar'])) ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <label for="avatar" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Tải lên ảnh của bạn</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input type="file" id="avatar" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                                </label>
                                                <p class="text-muted mb-0">Cho phép JPG, GIF hoặc PNG.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="user_email" class="form-label">E-mail</label>
                                                <input class="form-control" type="text" name="user_email" value="<?= esc($user_item['user_email']) ?>" />
                                            </div>
                                            <!-- <div class="mb-3 col-md-6">
                                                <label for="user_name" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="user_name" value="<?= esc($user_item['user_name']) ?>" readonly />
                                            </div> -->
                                            <div class="mb-3 col-md-6">
                                                <label for="user_fullname" class="form-label">Họ và tên</label>
                                                <input class="form-control" type="text" name="user_fullname" value="<?= esc($user_item['user_fullname']) ?>" autofocus />
                                            </div>
                                            <!-- <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input class="form-control" type="text" name="new_lastName" id="new_lastName" value="{{$user->lastname}}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">VN (+84)</span>
                                                    <input type="text" id="new_phoneNumber" name="new_phoneNumber" class="form-control" value="{{$user->phonenumber}}" placeholder="Enter phone number" />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="new_address" name="new_address" value="{{$user->address}}" placeholder="Address" />
                                            </div> -->
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
                                        </div>
                                    </div>
                                </form>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>
                    <!-- Edit Profile -->
                    <!-- /Account -->
                </div>
                <!-- Modal - Change - Password -->
            </div>
        </div>
    </div>
    <!-- / Content -->

    <script>
        const avatarInput = document.getElementById('avatar');
        const avatarImg = document.getElementById('uploadedAvatar');

        avatarInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                avatarImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>