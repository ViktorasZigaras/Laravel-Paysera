<?php

namespace App\Http\Controllers;

// use App\Author;
use Illuminate\Http\Request;
use Validator;

class MasterController extends Controller
{
    public function index()
    {
        // $authors = Author::orderBy('field', 'asc/desc')->get(); + multiple order bys for more sorting
        // $authors = Author::all()->sortBy/Desc('field');

        // return view('author.index', ['authors' => Author::all()->sortBy('name')]);
        // return view('book.index', ['books' => Book::all()->sortBy('title')]);
    }

    public function create()
    {
        // return view('author.create');
        // return view('book.create', ['authors' => Author::all()->sortBy('name')]);
    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),
        // [
        //     'name' => ['required', 'min:3', 'max:64'],
        //     'surname' => ['required', 'min:3', 'max:64'],
        // ]
        // );
        // if ($validator->fails()) {
        //     $request->flash();
        //     return redirect()->back()->withErrors($validator);
        // }
        // $author = Author::create($request->all());
        // $author->save();
        // return redirect()->route('author.index')->with('success_message', '<Author Created>');

        // $validator = Validator::make($request->all(),
        // [
        //     'title' => ['required', 'min:8', 'max:64'],
        //     'isbn' => ['required', 'min:8', 'max:32'],
        //     'pages' => ['required', 'min:1'],
        //     'about' => ['required', 'min:0', 'max:128'],
        //     'author_id' => ['required'],
        // ]
        // );
        // if ($validator->fails()) {
        //     $request->flash();
        //     return redirect()->back()->withErrors($validator);
        // }
        // $book = Book::create($request->all());
        // $book->save();
        // return redirect()->route('book.index')->with('success_message', '<Book Created>');
    }

    public function show(Author $author)
    {
        // $a = Book::where('name', 'ona')->first();
        // return view show
    }

    public function edit(Author $author)
    {
        // return view('author.edit', ['author' => $author]);
        // return view('book.edit', ['book' => $book, 'authors' => Author::all()]);
    }

    public function update(Request $request, Author $author)
    {
        // $validator = Validator::make($request->all(),
        // [
        //     'name' => ['required', 'min:3', 'max:64'],
        //     'surname' => ['required', 'min:3', 'max:64'],
        // ]
        // );
        // if ($validator->fails()) {
        //     $request->flash();
        //     return redirect()->back()->withErrors($validator);
        // }
        // $author->fill($request->all());
        // $author->save();
        // return redirect()->route('author.index')->with('success_message', '<Author Updated>');

        // $validator = Validator::make($request->all(),
        // [
        //     'title' => ['required', 'min:8', 'max:64'],
        //     'isbn' => ['required', 'min:8', 'max:32'],
        //     'pages' => ['required', 'min:1'],
        //     'about' => ['required', 'min:0', 'max:128'],
        //     'author_id' => ['required'],
        // ]
        // );
        // if ($validator->fails()) {
        //     $request->flash();
        //     return redirect()->back()->withErrors($validator);
        // }
        // $book->fill($request->all());
        // $book->save();
        // return redirect()->route('book.index')->with('success_message', '<Book Updated>');
    }

    public function destroy(Author $author)
    {
        // if($author->authorBooks->count()) {
        //     return redirect()->route('author.index')->with('info_message', '<Author Has Books>');
        // }
        // $author->delete();
        // return redirect()->route('author.index')->with('success_message', '<Author Deleted>');

        // $book->delete();
        // return redirect()->route('book.index')->with('success_message', '<Book Deleted>');
    }
}
