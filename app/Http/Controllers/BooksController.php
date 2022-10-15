<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Likes;
use App\Models\Comments;
use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BooksController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if (! Gate::allows('admin')) {
        abort(403);
        }
        $books = Books::with('likes','comments')->get();
        return view('books.list',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if (! Gate::allows('admin')) {
            abort(403);
        }
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'year'=>'required',
        ]);
        $book = new Books();
            $book->name = $request->name;
            $book->author=$request->author;
            $book->publisher=$request->publisher;
            $book->year=$request->year;
            $book->save();
        return back()->with('sucess','A book was added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function favorites(Request $request)
    {
        $id = $request->input('key');
        $user = Auth::user()->id;
        $state = Favorites::where('user_id',$user)->where('book_id',$id)->get();

        if(empty($state[0]->id)){
            $fav=new Favorites();
            $fav->user_id = $user;
            $fav->book_id = $id;
            $fav->save();
            return back();
        }else{
            $deleted = Favorites::where('user_id',$user)->where('book_id',$id)->delete();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function likes(books $books,Request $request)
    {
        $id = $request->input('key');
        $user = Auth::user()->id;

        $state = Likes::where('user_id',$user)->where('book_id',$id)->get();
  
        if(empty($state[0]->id)){
            $likes=new Likes();
            $likes->user_id = $user;
            $likes->book_id = $id;
            $likes->save();
            return back();
        }else{
            $deleted = Likes::where('user_id',$user)->where('book_id',$id)->delete();
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, books $books)
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $id = $request->input('key');
        $validated = $request->validate([
            'name'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'year'=>'required',
        ]);

        $updated = Books::where('id',$id)->update($validated);

        if($updated == 1){
            return back()->with('sucess','A book succesfuly updated');
        }else{
            return back()->with('error','nothing updated');
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(books $books,Request $request)
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $id = $request->input('key');
        $deleted = $books::where('id',$id)->delete();
        if($deleted == 1){
            return back()->with('sucess','A book succesfuly deleted');
        }else{
            return back()->with('error','nothing deleted');
        }
    }

    public function comments(books $books,Request $request)
    {
        $id = $request->input('key');
        $user = Auth::user()->id;

        $request->validate([
            'comment'=>'required',
        ]);

        $comments = new Comments();
        $comments->user_id = $user;
        $comments->book_id = $id;
        $comments->comment = $request->comment;
        $comments->save();
        return back();
    }

    public function books(books $books,Request $request)
    {
        $page = $request->input('page]');
  
        $request->validate([
            'page' =>['required', 'integer',]
        ]);

        return books::paginate($page);
    }

    public function popular(Request $request)
    {
        $page = $request->input('page]');
        
        $request->validate([
            'page' =>['required', 'integer',]
        ]);
        $books = Books::with('likes')->paginate($page);
        $data = [];
        foreach ($books as $book) {
            $tmp = [
                'id'=>$book->id,
                'tittle'=>$book->name,
                'author'=>$book->author,
                'publisher'=>$book->publisher,
                'year'=>$book->year,
                'likes'=>$book->likes->count(),
            ];

            array_push($data,$tmp);
        }
        return $data;
    }
}
