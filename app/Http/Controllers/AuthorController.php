<?php

namespace App\Http\Controllers;

use App\Models\User; // Changed from Author
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::all(); // Changed from Author::all()
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Changed to users table
        ]);

        User::create($request->all()); // Changed from Author::create()

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    public function show($user)
    {
        $author = User::where('name', $user)->orWhere('id', $user)->firstOrFail();
        return view('authors.show', compact('author'));
    }

    public function edit($id)
    {
        $author = User::findOrFail($id); // Changed from Author::findOrFail()
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Changed to users table
        ]);

        $author = User::findOrFail($id); // Changed from Author::findOrFail()
        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy($id)
    {
        $author = User::findOrFail($id); // Changed from Author::findOrFail()
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
