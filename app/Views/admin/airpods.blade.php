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

    <title>Tables - Basic Tables | Sneat - Bootstrap 5 HTML backend Template - Pro</title>

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
                
                <h3 class="card-header text-center">Airpods</h3>

                @if(session('success'))
                <div class="alert alert-success text-center">{{session('success')}}</div>
                @endif

                <button type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#modal-create-airpod">Create new airpods</button>

                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Color</th>
                        <th class="col-3">Picture</th>
                        <th class="col-4">Description</th>
                        <th class="col-2">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($airpods as $airpod)
                      <tr class="table-default">
                        <td><i class="fab fa-sketch fa-lg text-warning me-3"></i>{{$airpod->id}}</td>
                        <td><strong>{{$airpod->name}}</strong></td>
                        <td>{{$airpod->price}} $</td>
                        <td>{{$airpod->color}} </td>
                        <td>
                          <img src="{{ asset('storage/upload_airpods/' . $airpod->picture) }}" alt="picture" 
                            class="d-block rounded" height="30%" width="30%"/>
                        </td>
                        <td>{{$airpod->description}}</td>
                        <td>
                          <button type="button"
                          class="btn btn-outline-warning"
                          data-bs-toggle="modal"
                          data-bs-target="#modal-edit-{{$airpod->id}}">Edit</button>

                          <button type="submit"
                          class="btn btn-outline-danger"
                          data-bs-toggle="modal"
                          data-bs-target="#modal-delete-{{$airpod->id}}">Delete</button>
                        </td>
                      
                      </tr>
                    
                      
                    </tbody>

                    <!-- Edit modal -->
                    <div class="modal fade" id="modal-edit-{{$airpod->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/airpod-edit/{{$airpod->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" id="name" name="name" value="{{$airpod->name}}" class="form-control"
                                                                placeholder="Enter Name" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="description" class="form-label">Price</label>
                                                            <input type="text" id="price" name="price" value="{{$airpod->price}}" class="form-control"
                                                                placeholder="Enter price" />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col mb-3">
                                                            <label for="color" class="form-label">Color</label>
                                                            <select id="color" name="color" class="form-select">
                                                                <option value="{{$airpod->color}}">{{$airpod->color}}</option>
                                                                <option value="White" class="bg-white">White</option>
                                                                <option value="Gray" class="bg-secondary">Gray</option>
                                                                <option value="Black" class="bg-black">Black</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Change Picture airpod</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="file" id="new_picture"
                                                                name="new_picture" />
                                                        </div>
                                                    </div> -->
                                                    <div class="row mb-3">
                                                        <div>
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea class="form-control" rows="5" name="description"
                                                                id="description">{{$airpod->description}}</textarea>
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
                        <div class="modal fade" id="modal-delete-{{$airpod->id}}" tabindex="-1" aria-hidden="true">
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
                                    <form action="/airpod-delete/{{$airpod->id}}" method="POST">
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
          
              <!-- Modal - Create - airpod -->
              <div class="modal fade" id="modal-create-airpod" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel4">Add airpod</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/airpod.create" method="POST" enctype="multipart/form-data">
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
                                                <div class="col mb-3">
                                                    <label for="color" class="form-label">Color</label>
                                                    <select id="color" name="color" class="form-select">
                                                        <option value="none">Select color</option>
                                                        <option value="White" class="bg-white">White</option>
                                                        <option value="Gray" class="bg-secondary">Gray</option>
                                                        <option value="Black" class="bg-black">Black</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-company">Picture airpod</label>
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
                                    <button type="submit" class="btn btn-primary">Add new airpod</button>
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