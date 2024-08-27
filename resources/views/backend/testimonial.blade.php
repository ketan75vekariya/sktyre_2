@extends('backend.layouts.main')


@section('main-container')
            <div id="layoutSidenav_content">
                <main>
                    
                    <div class="container-fluid px-4">
                        @if(Session::has('success'))
                            <div class="alert alert-success mt-5" role="alert">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <h1 class="mt-4">Testimonials</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Testimonials</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div>
                                    
                                    Testimonial
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
                                    Add Testimonial
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Testimonial
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Client Name</th>
                                            <th>Testimonial</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Client Name</th>
                                            <th>Testimonial</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($testimonials-> isNotEmpty())
                                        @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td>{{$testimonial->id}}</td>
                                            <td>
                                                @if($testimonial->image != "")
                                                    <img src="{{asset('uploads/testimonial/'.$testimonial->image)}}" alt="{{$testimonial->testimonial}}" width="50" class="img-thumbnail">
                                                @endif
                                            </td>
                                            <td>{{$testimonial->client_name}}</td>
                                            <td>{{Str::limit($testimonial->testimonial,50)}}</td>
                                            <td>{{\Carbon\Carbon::parse($testimonial->created_at)->format('d M, Y')}}</td>
                                            <td>
                                                <button type="button" value="{{$testimonial->id}}" class="link-info testimonialViewLink"><i class="fas fa-eye"></i></button> | 
                                                <button type="button" value="{{$testimonial->id}}" class="link-warning testimonialEditLink" ><i class="fas fa-pencil-alt"></i></button> | 
                                                <button type="button" value="{{$testimonial->id}}" class="link-danger testimonialDeleteLink"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                        
                                        

                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Create Modal -->
                <div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Testimonial</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="{{route('testimonial.store')}}" id="userForm">
                        @csrf
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="Title" class="form-label">Client Name</label>
                                        <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{old('client_name')}}" placeholder="Enter Client Name">
                                        <span id = "client_name" style="color:red"> </span>
                                        @error('client_name')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="testimonial" class="form-label">Testimonial</label>
                                        <textarea type="text" class="form-control @error('testimonial') is-invalid @enderror" id="testimonial" name="testimonial" rows="2" placeholder="Enter Testimonial">{{old('testimonial')}}</textarea>
                                        <span id = "testimonial" style="color:red"> </span>
                                        @error('testimonial')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="formimage" class="form-label">Upload Image</label>
                                        <input class="form-control" type="file" id="image" name="image" placeholder="upload image">
                                      </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submitBtn">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Create Modal End-->

                <!--View Modal -->
                <div class="modal fade" id="testimonialViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Testimonial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <img src=" " id="viewTestimonialImage" class="img-fluid m-2">
                                <div class="card-body">
                                  <h5 class="card-title" id="viewTestimonialClientName">Client Name</h5>
                                  <p class="card-text" id="viewTestimonial"></p>
                                </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- View modal end-->

                <!-- Edit Modal -->
                <div class="modal fade" id="testimonialEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Testimonial</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="{{route('testimonial.update')}}" id="testimonialEditForm">
                        @csrf
                        {{method_field('PUT')}}
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="hidden" name="testimonial_id" id="testimonial_id"/>
                                        <label for="Title" class="form-label">Title</label>
                                        <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="editTestimonialClientName" name="client_name" placeholder="Enter Client Name">
                                        <span id = "client_name" style="color:red"> </span>
                                        @error('client_name')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="Testimonial" class="form-label">Testimonial</label>
                                        <textarea type="text" class="form-control @error('testimonial') is-invalid @enderror" id="editTestimonial" name="testimonial" rows="2" placeholder="Enter testimonial"></textarea>
                                        <span id = "testimonial" style="color:red"> </span>
                                        @error('testimonial')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        
                                        <img src=" " id="editTestimonialImage" width="100" class="img-thumbnail m-2">
                                        
                                        <label for="formimage" class="form-label">Upload Image</label>
                                        <input class="form-control" type="file"  name="image" placeholder="upload image">
                                      </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="editTestimonialSubmitBtn" >Update Testimonial</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal End-->

                <!--Delete modal-->
                <div class="modal fade" id="deleteTestimonialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete id : #1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Are you sure you want to delete this testimonial?</h3>
                        </div>
                        <div class="modal-footer">
                        <form method="POST" action="{{route('testimonial.delete')}}" id="testimonialDeleteForm">
                            @csrf
                            {{method_field('Delete')}}
                            <input type="hidden" name="testimonial_id" id="deleteTestimonial_id"/>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <!--Delete modal end-->
                
                
@endsection
