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
            <h1 class="mt-4">About</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">About</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        About
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    About
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if($abouts-> isNotEmpty())
                            @foreach($abouts as $about)
                            <tr>
                                <td>{{$about->id}}</td>
                                <td>{{$about->title}}</td>
                                <td>{{Str::limit($about->description,50)}}</td>
                                <td>{{\Carbon\Carbon::parse($about->created_at)->format('d M, Y')}}</td>
                                <td>
                                    <button type="button" value="{{$about->id}}" class="link-info aboutViewLink"><i class="fas fa-eye"></i></button> | 
                                    <button type="button" value="{{$about->id}}" class="link-warning aboutEditLink" ><i class="fas fa-pencil-alt"></i></button>
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

    <!--View Modal -->
    <div class="modal fade" id="aboutViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="viewAboutTitle">title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                      <p class="card-text" id="viewAboutDescription">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
    <div class="modal fade" id="aboutEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update About</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('about.update')}}" id="aboutEditForm">
            @csrf
            {{method_field('PUT')}}
                <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="about_id" id="about_id"/>
                            <label for="Title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="editAboutTitle" name="title" placeholder="Enter about title">
                            <span id = "title" style="color:red"> </span>
                            @error('title')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="longDescription" class="form-label">Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="editAboutDescription" name="description" rows="5" placeholder="Enter detailed description about us" ></textarea>
                            <span id = "description" style="color:red"> </span>
                            @error('description')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="editAboutSubmitBtn" >Update Service</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal End-->


@endsection