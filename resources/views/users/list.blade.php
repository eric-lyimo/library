@extends('layouts.app')
@section('content')
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-dashboard"></i></a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Username</th>                                    
                                        <th>Email</th>                                    
                                        <th>Role</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key=> $user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->roles[0]->name}}</td>
                                        <td>                                            
                                        <button type="button" class="btn btn-primary" title="Edit" data-toggle="modal" data-target="#editUser{{$user->id}}"><i class="fa fa-edit"></i></button>
                                        <a href="#defaultModal{{$user->id}}" data-toggle="modal" data-target="#defaultModal{{$user->id}}" class="btn btn-danger"> <i class="fa fa-trash-o"></i> </a>
                                            <div class="modal fade" id="defaultModal{{$user->id}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">Delete User</h4>
                                                        </div>
                                                        <div class="modal-body"> Are you Sure you want to Delete {{$user->name}}</div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-danger" href="{{route('users.destroy')}}?key={{$user->id}}">YES</a>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </div>

     @foreach ($users as $key=> $user) 
        <div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="title" id="defaultModalLabel">Edit User</h6>
                    </div>                                   
                    <div class="modal-body demo-masked-input">
                            <div class="card invoice1">                        
                                <div class="body">
                                    <form action="{{route('users.update')}}?key={{$user->id}}" method='post'>
                                        @csrf
                                        <div class="row clearfix">
                                        <div class="row mb-3">
                                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control " name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email" value="{{$user->email}}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                        <div class="col-md-8  c_multiselect">
                                            <select name="role" class="form-control multiselect multiselect-custom" >
                                                @foreach ($roles as $role )
                                                @if ($role->name === $user->roles[0]->name)
                                                    <option selected value="{{$role->id}}">{{$role->name}}</option> 
                                                @else
                                                    <option value="{{$role->id}}">{{$role->name}}</option>  
                                                @endif
                                                @endforeach  
                                            </select>
                                        </div>
                                    </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update </button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                         </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection