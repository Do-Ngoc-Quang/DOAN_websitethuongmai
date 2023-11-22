<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML backend Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-backend-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../backend/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Ipad</title>

    <!-- <meta name="description" content="" /> -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../backend/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../backend/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../backend/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../backend/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../backend/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../backend/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../backend/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
    <!-- foreach($users as $user) -->
    <!-- if($user->id == $user_id_current) -->
      <div class="layout-container">
        <!-- Menu -->
        @include('backend.includes.menu')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <!-- include('backend.includes.navbar') -->
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Contextual Classes -->

              <div class="card">
                
                <h3 class="card-header text-center">Ipads</h3>

                @if(session('success'))
                <div class="alert alert-success text-center">{{session('success')}}</div>
                @endif

                <button type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#modal-create-ipad">Create new Ipads</button>

                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th class="col-3">Picture</th>
                        <th class="col-4">Description</th>
                        <th class="col-2">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($ipads as $ipad)
                      <tr class="table-default">
                        <td><i class="fab fa-sketch fa-lg text-warning me-3"></i>{{$ipad->id}}</td>
                        <td><strong>{{$ipad->name}}</strong></td>
                        <td>{{$ipad->price}} $</td>
                        <td>
                          <img src="{{ asset('storage/upload_ipads/' . $ipad->picture) }}" alt="picture" 
                            class="d-block rounded" height="30%" width="30%"/>
                        </td>
                        <td>{{$ipad->description}}</td>
                        <td>
                          <button type="button"
                          class="btn btn-outline-warning"
                          data-bs-toggle="modal"
                          data-bs-target="#modal-edit-{{$ipad->id}}">Edit</button>

                          <button type="submit"
                          class="btn btn-outline-danger"
                          data-bs-toggle="modal"
                          data-bs-target="#modal-delete-{{$ipad->id}}">Delete</button>
                        </td>
                      
                      </tr>
                    
                      
                    </tbody>

                    <!-- Edit modal -->
                    <div class="modal fade" id="modal-edit-{{$ipad->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Edit Ipad</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/ipad-edit/{{$ipad->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" id="name" name="name" value="{{$ipad->name}}" class="form-control"
                                                                placeholder="Enter Name" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="description" class="form-label">Price</label>
                                                            <input type="text" id="price" name="price" value="{{$ipad->price}}" class="form-control"
                                                                placeholder="Enter price" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-3">
                                                        <div>
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea class="form-control" rows="5" name="description"
                                                                id="description">{{$ipad->description}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Delete modal -->
                        <div class="modal fade" id="modal-delete-{{$ipad->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Comfirm Delete</h5>
                                        <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                        ></button>
                                    </div>
                                    <form action="/ipad-delete/{{$ipad->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')

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
                        @endforeach
                  </table>
                </div>
              </div>
              <div class="row mt-5">
                {{$page}}
              </div>
          
              <!-- Modal - Create - ipad -->
              <div class="modal fade" id="modal-create-ipad" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel4">Add ipad</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/ipad.create" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" id="name" name="name" value="" class="form-control"
                                                        placeholder="Enter Name" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="description" class="form-label">Price</label>
                                                    <input type="text" id="price" name="price" value="" class="form-control"
                                                        placeholder="Enter price" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-company">Picture ipad</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="file" id="picture"
                                                        name="picture" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div>
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" rows="5" name="description"
                                                        id="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <input type="hidden" name="type" value="ipad">
                                    <button type="submit" class="btn btn-primary">Add new ipad</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

              <!--/ Contextual Classes -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('backend.includes.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    <!-- endif -->
    <!-- endforeach -->

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../backend/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../backend/assets/vendor/libs/popper/popper.js"></script>
    <script src="../backend/assets/vendor/js/bootstrap.js"></script>
    <script src="../backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../backend/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Main JS -->
    <script src="../backend/assets/js/main.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

  </body>
</html>