@extends('layouts.app')

@section('content')
<div class="row clearfix row-deck">
    @foreach ($books as $book)
        <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card top_widget primary-bg">
                    <div class="body">
                        <div class="icon bg-light"><i class="fa fa-book"></i> </div>
                        <div class="content text-light">
                            <div class="text mb-2 text-uppercase">{{$book->name}}</div>
                            <h4 class="number mb-0"></h4>
                            <small>{{$book->author}}</small>
                            <div class="row"> 
                                <div class="col">
                                    <a href="{{route('books.likes')}}?key={{$book->id}}" class="btn btn-danger"> <i class="fa fa-check"></i> {{$book->likes->count()}} likes </a>
                                </div>
                                <div class="col">   
                                    <a href="{{route('books.favorite')}}?key={{$book->id}}" class="btn btn-info"> <i class="fa fa-heart"></i>favorite </a>
                                </div>
                                <div class="col">
                                    <a href="#defaultModal{{$book->id}}" data-toggle="modal" data-target="#defaultModal{{$book->id}}" class="btn btn-info"> <i class="fa fa-comments"></i> {{$book->comments->count()}} </a>
                                    <div class="modal fade" id="defaultModal{{$book->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="title" id="defaultModalLabel">Add Comment</h4>
                                                </div>
                                                <form action="{{route('books.comments')}}?key={{$book->id}}" method='post'>
                                                    @csrf
                                                    <textarea name="comment" rows="4" cols="50"></textarea>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Comment </button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    @endforeach
</div>

@endsection
