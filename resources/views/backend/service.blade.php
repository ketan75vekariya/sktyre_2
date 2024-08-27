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
                        <h1 class="mt-4">Services</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Services</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div>
                                    
                                    Services
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add Service
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Service
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Main Description</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Main Description</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($services-> isNotEmpty())
                                        @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->id}}</td>
                                            <td>
                                                @if($service->image != "")
                                                    <img src="{{asset('uploads/service/'.$service->image)}}" alt="{{$service->title}}" width="50" class="img-thumbnail">
                                                @endif
                                            </td>
                                            <td>{{$service->title}}</td>
                                            <td>{{Str::limit($service->short_description,20)}}</td>
                                            <td>{{Str::limit($service->main_description,50)}}</td>
                                            <td>{{\Carbon\Carbon::parse($service->created_at)->format('d M, Y')}}</td>
                                            <td>
                                                <button type="button" value="{{$service->id}}" class="link-info serviceViewLink"><i class="fas fa-eye"></i></button> | 
                                                <button type="button" value="{{$service->id}}" class="link-warning serviceEditLink" ><i class="fas fa-pencil-alt"></i></button> | 
                                                <button type="button" value="{{$service->id}}" class="link-danger serviceDeleteLink"><i class="far fa-trash-alt"></i></button>
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
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Service</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="{{route('service.store')}}" id="userForm">
                        @csrf
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="Title" class="form-label">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" placeholder="Enter service title">
                                        <span id = "title" style="color:red"> </span>
                                        @error('title')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="shortDescription" class="form-label">Short Description</label>
                                        <textarea type="text" class="form-control @error('s_description') is-invalid @enderror" id="s_description" name="s_description" rows="2" placeholder="Enter short description about the service">{{old('s_description')}}</textarea>
                                        <span id = "s_description" style="color:red"> </span>
                                        @error('s_description')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="longDescription" class="form-label">Description</label>
                                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Enter detailed description about the service" >{{old('description')}}</textarea>
                                        <span id = "description" style="color:red"> </span>
                                        @error('description')
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
                                <button type="submit" class="btn btn-primary" id="submitBtn" onclick="matchPassword()">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Create Modal End-->

                <!--View Modal -->
                <div class="modal fade" id="serviceViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Service id : #1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <img src=" " id="viewServiceImage" class="img-fluid m-2">
                                <div class="card-body">
                                  <h5 class="card-title" id="viewServiceTitle">Service title</h5>
                                  <p class="card-text" id="viewServiceDescription">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                <div class="modal fade" id="serviceEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update The Service</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="{{route('service.update')}}" id="serviceEditForm">
                        @csrf
                        {{method_field('PUT')}}
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="hidden" name="service_id" id="service_id"/>
                                        <label for="Title" class="form-label">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="editServiceTitle" name="title" placeholder="Enter service title">
                                        <span id = "title" style="color:red"> </span>
                                        @error('title')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="shortDescription" class="form-label">Short Description</label>
                                        <textarea type="text" class="form-control @error('s_description') is-invalid @enderror" id="editServiceShortDescription" name="s_description" rows="2" placeholder="Enter short description about the service"></textarea>
                                        <span id = "s_description" style="color:red"> </span>
                                        @error('s_description')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="longDescription" class="form-label">Description</label>
                                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="editServiceDescription" name="description" rows="5" placeholder="Enter detailed description about the service" ></textarea>
                                        <span id = "description" style="color:red"> </span>
                                        @error('description')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        
                                        <img src=" " id="editServiceImage" width="100" class="img-thumbnail m-2">
                                        
                                        <label for="formimage" class="form-label">Upload Image</label>
                                        <input class="form-control" type="file"  name="image" placeholder="upload image">
                                      </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="editServiceSubmitBtn" >Update Service</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal End-->

                <!--Delete modal-->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete id : #1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Are you sure you want to delete this service?</h3>
                        </div>
                        <div class="modal-footer">
                        <form enctype="multipart/form-data" method="POST" action="{{route('service.delete')}}" id="serviceEditForm">
                            @csrf
                            {{method_field('Delete')}}
                            <input type="hidden" name="service_id" id="deleteService_id"/>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <!--Delete modal end-->
                
                
@endsection
