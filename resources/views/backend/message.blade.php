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
                        <h1 class="mt-4">messages</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/administration/home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Message</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div>
                                    
                                    Messages
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addMessageModal">
                                    Add Message
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Message
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($messages-> isNotEmpty())
                                        @foreach($messages as $message)
                                        <tr>
                                            <td>{{$message->id}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->phone}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>{{Str::limit($message->message,20)}}</td>
                                            <td>{{\Carbon\Carbon::parse($message->created_at)->format('d M, Y')}}</td>
                                            <td>
                                                <button type="button" value="{{$message->id}}" class="link-info messageViewLink"><i class="fas fa-eye"></i></button> | 
                                                <button type="button" value="{{$message->id}}" class="link-warning messageEditLink" ><i class="fas fa-pencil-alt"></i></button> | 
                                                <button type="button" value="{{$message->id}}" class="link-danger messageDeleteLink"><i class="far fa-trash-alt"></i></button>
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
                <div class="modal fade" id="addMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Service</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{route('message.store')}}" id="userForm">
                        @csrf
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="Name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Enter client's name">
                                        <span id = "name" style="color:red"> </span>
                                        @error('name')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="Email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="Enter client's email address">
                                        <span id = "email" style="color:red"> </span>
                                        @error('email')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="Phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control @error('text') is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter client's phone number">
                                        <span id = "email" style="color:red"> </span>
                                        @error('email')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="Subject" class="form-label">Subject</label>
                                        <textarea type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" rows="2" placeholder="Enter subject of the message">{{old('subject')}}</textarea>
                                        <span id = "subject" style="color:red"> </span>
                                        @error('subject')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea type="text" class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Enter the message" >{{old('message')}}</textarea>
                                        <span id = "message" style="color:red"> </span>
                                        @error('message')
                                            <p class="invalid-feedback">{{$message}}</p>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submitBtn" >Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Create Modal End-->

                <!--View Modal -->
                <div class="modal fade" id="messageViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <label class="form-label">Name :</label>
                                    <p class="card-text" id="viewMessageName"> </p>
                                    <label class="form-label">Email address :</label>
                                    <p class="card-text" id="viewMessageEmail"> </p>
                                    <label class="form-label">Phone Numer :</label>
                                    <p class="card-text" id="viewMessagePhone"> </p>
                                    <label class="form-label">Subject :</label>
                                    <p class="card-text" id="viewMessageSubject"> </p>
                                    <label class="form-label">Message :</label>
                                    <p class="card-text" id="viewMessage"> </p>
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
                <div class="modal fade" id="messageEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update The Service</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="{{route('message.update')}}" id="messageEditForm">
                        @csrf
                        {{method_field('PUT')}}
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="hidden" name="message_id" id="message_id"/>
                                    <label for="Name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="editMessageName" name="name" value="{{old('name')}}" placeholder="Enter client's name">
                                    <span id = "name" style="color:red"> </span>
                                    @error('name')
                                        <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="editMessageEmail" name="email" value="{{old('email')}}" placeholder="Enter client's email address">
                                    <span id = "email" style="color:red"> </span>
                                    @error('email')
                                        <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('text') is-invalid @enderror" id="editMessagePhone" name="phone" value="{{old('phone')}}" placeholder="Enter client's phone number">
                                    <span id = "email" style="color:red"> </span>
                                    @error('email')
                                        <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Subject" class="form-label">Subject</label>
                                    <textarea type="text" class="form-control @error('subject') is-invalid @enderror" id="editMessageSubject" name="subject" rows="2" placeholder="Enter subject of the message">{{old('subject')}}</textarea>
                                    <span id = "subject" style="color:red"> </span>
                                    @error('subject')
                                        <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea type="text" class="form-control @error('message') is-invalid @enderror" id="editMessage" name="message" rows="5" placeholder="Enter the message" >{{old('message')}}</textarea>
                                    <span id = "message" style="color:red"> </span>
                                    @error('message')
                                        <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
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
                <div class="modal fade" id="deleteMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Are you sure you want to delete this message?</h3>
                        </div>
                        <div class="modal-footer">
                        <form enctype="multipart/form-data" method="POST" action="{{route('message.delete')}}" id="messageDeleteForm">
                            @csrf
                            {{method_field('Delete')}}
                            <input type="hidden" name="message_id" id="deleteMessage_id"/>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <!--Delete modal end-->
                
                
@endsection
