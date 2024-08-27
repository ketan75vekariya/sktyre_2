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
                            <li class="breadcrumb-item"><a href="administration/home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Team</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div>
                                    
                                    Team
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add Member
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Team
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>About</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>About</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($teams-> isNotEmpty())
                                        @foreach($teams as $team)
                                        <tr>
                                            <td>{{$team->id}}</td>
                                            <td>
                                                @if($team->image != "")
                                                    <img src="{{asset('uploads/team/'.$team->image)}}" alt="{{$team->name}}"sxx width="50" class="img-thumbnail">
                                                @endif
                                            </td>
                                            <td>{{$team->name}}</td>
                                            <td>{{$team->position}}</td>
                                            <td>{{Str::limit($team->about,50)}}</td>
                                            <td>{{\Carbon\Carbon::parse($team->created_at)->format('d M, Y')}}</td>
                                            <td>
                                                <button type="button" value="{{$team->id}}" class="link-info teamViewLink"><i class="fas fa-eye"></i></button> | 
                                                <button type="button" value="{{$team->id}}" class="link-warning teamEditLink" ><i class="fas fa-pencil-alt"></i></button> | 
                                                <button type="button" value="{{$team->id}}" class="link-danger teamDeleteLink"><i class="far fa-trash-alt"></i></button>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Memeber</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="{{route('team.store')}}" id="userForm">
                        @csrf
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="Name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Enter member's name">
                                        <span id = "name" style="color:red"> </span>
                                        @error('name')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="Position" class="form-label">Position</label>
                                        <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{old('position')}}" placeholder="Enter member's position">
                                        <span id = "position" style="color:red"> </span>
                                        @error('position')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="About" class="form-label">About</label>
                                        <textarea type="text" class="form-control @error('about') is-invalid @enderror" id="about" name="about" rows="2" placeholder="Enter short description about the member">{{old('about')}}</textarea>
                                        <span id = "about" style="color:red"> </span>
                                        @error('about')
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
                <div class="modal fade" id="teamViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Memeber</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <img src=" " id="viewTeamImage" class="img-fluid m-2">
                                <div class="card-body">
                                  <h5 class="card-title" id="viewTeamName">Team Name</h5>
                                  <p class="card-text" id="viewTeamAbout">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
                <div class="modal fade" id="teamEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update The Member</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="{{route('team.update')}}" id="teamEditForm">
                        @csrf
                        {{method_field('PUT')}}
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="hidden" name="team_id" id="team_id"/>
                                        <label for="Name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="editTeamName" name="name" placeholder="Enter Memebr's Name">
                                        <span id = "name" style="color:red"> </span>
                                        @error('name')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div><div class="mb-3">
                                        <label for="Position" class="form-label">Position</label>
                                        <input type="text" class="form-control @error('position') is-invalid @enderror" id="editTeamPosition" name="position" placeholder="Enter Memebr's Position">
                                        <span id = "position" style="color:red"> </span>
                                        @error('position')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="teamAbout" class="form-label">About</label>
                                        <textarea type="text" class="form-control @error('about') is-invalid @enderror" id="editTeamAbout" name="about" rows="2" placeholder="Enter Short Description About Memeber"></textarea>
                                        <span id = "about" style="color:red"> </span>
                                        @error('about')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        
                                        <img src=" " id="editTeamImage" width="100" class="img-thumbnail m-2">
                                        
                                        <label for="formimage" class="form-label">Upload Image</label>
                                        <input class="form-control" type="file"  name="image" placeholder="upload image">
                                      </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="editTeamSubmitBtn" >Update Service</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal End-->

                <!--Delete modal-->
                <div class="modal fade" id="deleteTeamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Memeber</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Are you sure you want to delete this member?</h3>
                        </div>
                        <div class="modal-footer">
                        <form enctype="multipart/form-data" method="POST" action="{{route('team.delete')}}" id="teamEditForm">
                            @csrf
                            {{method_field('Delete')}}
                            <input type="hidden" name="team_id" id="deleteTeam_id"/>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <!--Delete modal end-->
                
                
@endsection
