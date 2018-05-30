<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    //Topページ表示
    public  function index(){
        $books = Book::orderBy('created_at','asc')->paginate(3);
        return view('books',[
            'books'=>$books
        ]);
    }
    //登録
    public  function registration(Request $request){
        $validator = Validator::make($request->all(),[
            'item_name'=>'required|max:255|min:3',
            'item_number'=>'required|max:3|min:1',
            'item_amount'=>'required|max:6',
            'published'=>'required',
        ]);
        if ($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $books = new Book();
        $books->item_name = $request->item_name;
        $books->item_number=$request->item_number;
        $books->item_amount=$request->item_amount;
        $books->published=$request->published;
        $books->save();
        return redirect('/');

    }

    //更新画面へ移動
    public function goToUpdate(Book $book){
        return view('edit',[
            'book'=>$book
        ]);
    }

    //更新
    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'id'=>'required',
            'item_name'=>'required|max:255|min:3',
            'item_number'=>'required|max:3|min:1',
            'item_amount'=>'required|max:6',
            'published'=>'required',
        ]);
        if ($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $books = Book::find($request->id);
        $books->item_name = $request->item_name;
        $books->item_number=$request->item_number;
        $books->item_amount=$request->item_amount;
        $books->published=$request->published;
        $books->save();
        return redirect('/');
    }

    //削除
    public function delete(Book $book){
        $book->delete();
        return redirect('/');
    }

}
