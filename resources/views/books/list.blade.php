@extends('layouts.app')
@section('content')
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i></a></li>
                            <li class="breadcrumb-item active">Books store</li>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                
                            </div>
                            <div class="p-2 d-flex">
                                <ul class="nav nav-tabs-new2">
                                    <li><a class="nav-link active" href="{{route('books.create')}}">Add Book</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Book Name</th>                                    
                                        <th>Author</th>                                    
                                        <th>Publisher</th>
                                        <th>Publication date</th>
                                        <th>Likes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $key=>$book )
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{$book->name}}</td>                                   
                                        <td>{{$book->author}}</td>
                                        <td>{{$book->publisher}}</td>
                                        <td>{{$book->year}}</td>
                                        <td>{{$book->likes->count()}}</td>
                                        <td>                                            
                                            <button type="button" class="btn btn-primary" title="Edit" data-toggle="modal" data-target="#editBook{{$book->id}}"><i class="fa fa-edit"></i></button>
                                            <a href="#defaultModal" data-toggle="modal" data-target="#defaultModal" class="btn btn-danger"> <i class="fa fa-trash-o"></i> </a>
                                            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">Delete Receivable</h4>
                                                        </div>
                                                        <div class="modal-body"> Are you Sure you want to Delete {{$book->name}} </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-danger" href="{{route('books.destroy')}}?key={{$book->id}}">YES</a>
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
        
        @foreach ($books as $key=>$book )
        <div class="modal fade" id="editBook{{$book->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="title" id="defaultModalLabel">Edit Book</h6>
                    </div>                                   
                    <div class="modal-body demo-masked-input">
                            <div class="card invoice1">                        
                                <div class="body">
                                    <form action="{{route('books.update')}}?key={{$book->id}}" method='post'>
                                        @csrf
                                        <div class="row clearfix">
                                        <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control " name="name" value="{{$book->name}}" required  autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Author') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="author" value="{{$book->author}}" required>
                                            @error('author')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Publisher') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="text" class="form-control" name="publisher" value="{{$book->publisher}}" required >

                                            @error('publisher')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="year" value="{{$book->year}}" required >

                                            @error('year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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