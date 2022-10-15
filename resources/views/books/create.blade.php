@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i></a></li>
                <li class="breadcrumb-item active">Add book</li>
            </ul>
        </div>
        <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-12"></div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="body demo-card">
                        <form action="{{route('books.store')}}" method='post'>
                            @csrf
                            <div class="row clearfix">
                                <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

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
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="author" placeholder="author" required>

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
                                    <input id="password-confirm" type="text" class="form-control" name="publisher" required>
                                </div>

                                @error('publisher')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="text" class="form-control" name="year" required>
                                </div>

                                @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary" style="width:100%;">Add Book</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    