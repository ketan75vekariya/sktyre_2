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
            <h1 class="mt-4">Company Info</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">company</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        Company
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Company
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if($companies-> isNotEmpty())
                            @foreach($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->email}}</td>
                                <td>&#43;{{$company->phone}}</td>
                                <td>{{$company->address}}</td>
                                <td>{{\Carbon\Carbon::parse($company->created_at)->format('d M, Y')}}</td>
                                <td>
                                    <button type="button" value="{{$company->id}}" class="link-info companyViewLink"><i class="fas fa-eye"></i></button> | 
                                    <button type="button" value="{{$company->id}}" class="link-warning companyEditLink" ><i class="fas fa-pencil-alt"></i></button>
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
    <div class="modal fade" id="companyViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <label class="form-label">Email address :</label>
                        <p class="card-text" id="viewCompanyEmail"> </p>
                        <label class="form-label">Phone Numer :</label>
                        <p class="card-text" id="viewCompanyPhone"> </p>
                        <label class="form-label">Address :</label>
                        <p class="card-text" id="viewCompanyAddress"> </p>
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
    <div class="modal fade" id="companyEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Company Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('company.update')}}" id="companyEditForm">
            @csrf
            {{method_field('PUT')}}
                <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="company_id" id="company_id"/>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="editCompanyEmail" name="email" placeholder="Enter Email Address">
                            <span id = "email" style="color:red"> </span>
                            @error('email')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="editCompanyPhone" name="phone" placeholder="Enter Phone Number">
                            <span id = "email" style="color:red"> </span>
                            @error('phone')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="editCompanyAddress" name="address" rows="5" placeholder="Enter Company Address" ></textarea>
                            <span id = "address" style="color:red"> </span>
                            @error('address')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="editCompanySubmitBtn" >Update Information</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal End-->


@endsection