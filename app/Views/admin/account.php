
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
    
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <?php if (!empty($user) && is_array($user)): ?>

                    <form action="account/<?= esc($user['id']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field('') ?>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="avatar" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="avatar" name="avatar" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <!-- <button type="button" class="btn btn-outline-primary account-image-reset mb-4" data-bs-toggle="modal"
                                    data-bs-target="#modal-change-password">
                                    <span class="tf-icons bx bx-bell"></span>&nbsp; Change Password
                                </button> -->   
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG.</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="new_email" name="new_email" value="<?= esc($user['user_email']) ?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['user_name']) ?>"
                                    readonly />
                            </div>
                            <!-- <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input class="form-control" type="text" id="new_firstName" name="new_firstName"
                                    value="{{$user->firstname}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="new_lastName" id="new_lastName"
                                    value="{{$user->lastname}}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">VN (+84)</span>
                                    <input type="text" id="new_phoneNumber" name="new_phoneNumber" class="form-control"
                                        value="{{$user->phonenumber}}" placeholder="Enter phone number" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="new_address" name="new_address" value="{{$user->address}}"
                                    placeholder="Address" />
                            </div> -->
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </div>
                </form>
              <p>Unable to find user.</p>
            <?php endif ?>
                    <!-- Edit Profile -->
                    <!-- /Account -->
                  </div>
                  <!-- Modal - Change - Password -->
                </div>
              </div>
            </div>
            <!-- / Content -->


           