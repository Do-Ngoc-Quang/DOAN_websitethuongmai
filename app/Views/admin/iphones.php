
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Contextual Classes -->

              <div class="card">
                
                <h3 class="card-header text-center">iPhones</h3>

                @if(session('success'))
                <div class="alert alert-success text-center">{{session('success')}}</div>
                @endif

                <button type="button"
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#modal-create-iphone">Create new iphones</button>

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
                    @foreach($iphones as $iphone)
                      <tr class="table-default">
                        <td><i class="fab fa-sketch fa-lg text-warning me-3"></i>{{$iphone->id}}</td>
                        <td><strong>{{$iphone->name}}</strong></td>
                        <td>{{$iphone->price}} $</td>
                        <td>
                          <img src="{{ asset('storage/upload_iphones/' . $iphone->picture) }}" alt="picture" 
                            class="d-block rounded" height="30%" width="30%"/>
                        </td>
                        <td>{{$iphone->description}}</td>
                        <td>
                          <button type="button"
                          class="btn btn-outline-warning"
                          data-bs-toggle="modal"
                          data-bs-target="#modal-edit-{{$iphone->id}}">Edit</button>

                          <button type="submit"
                          class="btn btn-outline-danger"
                          data-bs-toggle="modal"
                          data-bs-target="#modal-delete-{{$iphone->id}}">Delete</button>
                        </td>
                      
                      </tr>
                    
                      
                    </tbody>

                    <!-- Edit modal -->
                    <div class="modal fade" id="modal-edit-{{$iphone->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Edit Iphone</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/iphone-edit/{{$iphone->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" id="name" name="name" value="{{$iphone->name}}" class="form-control"
                                                                placeholder="Enter Name" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="description" class="form-label">Price</label>
                                                            <input type="text" id="price" name="price" value="{{$iphone->price}}" class="form-control"
                                                                placeholder="Enter price" />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div>
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea class="form-control" rows="5" name="description"
                                                                id="description">{{$iphone->description}}</textarea>
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
                        <div class="modal fade" id="modal-delete-{{$iphone->id}}" tabindex="-1" aria-hidden="true">
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
                                    <form action="/iphone-delete/{{$iphone->id}}" method="POST">
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
          
              <!-- Modal - Create - iphone -->
              <div class="modal fade" id="modal-create-iphone" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel4">Add iphone</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/iphone.create" method="POST" enctype="multipart/form-data">
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
                                                <label class="col-sm-2 col-form-label" for="basic-default-company">Picture iphone</label>
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
                                    <input type="hidden" name="type" value="iphone">
                                    <button type="submit" class="btn btn-primary">Add new iphone</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

              <!--/ Contextual Classes -->
            </div>
            <!-- / Content -->

            