<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('author')->get();
        // $books = Book::join('authors', 'books.author_id' , '=' , 'author_id')
        //     ->where('authors.name', 'Jadon Sanford')
        //     ->where('title', 'like', '%a%')
        //     ->pluck('title')->dd();
        // $author = Author::where('authors.name', 'Aracely Pacocha I')->first();
        // $books = $author->books()
        //     ->where('title', 'like', '%a%')
        //     ->pluck('title')
        //     ->dd();

        // Author::whereHas('books', function($query){
        //     $query->where('title', 'like', '%b%');
        // })->get()->dd();

        
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $author = Author::firstOrCreate(['name' => $request->author]);

        // Book::create([
        //     'author_id' => $author->id,
        //     'title' => $request->title
        // ]);

        $titles = collect(explode(',', $request->title))->map(function($record){
            return ['title' => $record];
        })->toArray();
        //dd($titles);

        $author->books()->createMany($titles);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }


    public function test(){
        $time_start = $this->microtime_float();

        $books = Book::with('author')
            ->where('title', 'like', '%a%')
            ->take(50)
            ->get(); //Eloquent query

        $time_end = $this->microtime_float();
        $time = $time_end - $time_start;
        return $time;
    }

    public function test2(){
        $time_start = $this->microtime_float();

        $books = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->where('title', 'like', '%a%')
            ->get(); //Query builder query

        $time_end = $this->microtime_float();
        $time = $time_end - $time_start;
        return $time;
    }

    public function test3(){
        $time_start = $this->microtime_float();

        $books = DB::select("select * from books join authors on books.author_id = authors.id where title like '%a%'");
        //sql
        $time_end = $this->microtime_float();
        $time = $time_end - $time_start;
        return $time;
    }

    public function microtime_float(){
        list($usec, $sec) = explode(' ', microtime());
        return ((float)$usec + (float)$sec);
    }
}
