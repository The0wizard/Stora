<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['category', 'promotions'])->get();
        return view('admin.books.index', compact('books'));
    }

public function index_users()
{
    $books = Book::with('promotions')->latest()->paginate(9); // 9 per page
    $categories = Category::all();  // Fetch categories for the form
    return view('books.index', compact('books','categories'));
}
public function show_users($id)
{
    $book = Book::with(['category', 'promotions'])->findOrFail($id);
    return view('books.show', compact('book'));
}

    public function create()
    {
        $categories = Category::all();  // Fetch categories for the form
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'description' => 'required|string',
'featured' => 'required|in:0,1',
    ]);

    $book = new Book();
    $book->title = $request->title;
    $book->author = $request->author;
    $book->price = $request->price;
    $book->category_id = $request->category_id;
    $book->description = $request->description;

    // Handle featured status
$book->featured = $request->featured; // It will be 1 or 0

    if ($request->hasFile('thumbnail')) {
        // Store the file in the public disk under the 'thumbnails' directory
        $path = $request->file('thumbnail')->store('thumbnails', 'public');
        $book->thumbnail = Storage::url($path);  // Get the public URL
    }

    $book->save();

    return redirect()->route('admin.books.index')->with('success', 'Book created successfully!');
}




    public function show($id)
    {
        $book = Book::with(['category', 'promotions'])->findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
{
    $book = Book::findOrFail($id);
    $categories = Category::all();  // Fetch categories for the form
    return view('admin.books.edit', compact('book', 'categories'));
}


    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'description' => 'required|string',
'featured' => 'required|in:0,1',
    ]);

    $book = Book::findOrFail($id);
    $book->title = $request->title;
    $book->author = $request->author;
    $book->price = $request->price;
    $book->category_id = $request->category_id;
    $book->description = $request->description;

    // Handle featured status
$book->featured = $request->featured; // It will be 1 or 0

    // Check if the user uploaded a new thumbnail
    if ($request->hasFile('thumbnail')) {
        // Delete the old thumbnail if it exists
        if ($book->thumbnail) {
            // Delete the old file from public storage
            $oldThumbnailPath = str_replace('/storage/', 'public/', $book->thumbnail); // Convert the public URL to the storage path
            Storage::delete($oldThumbnailPath);
        }

        // Store the new thumbnail in the 'public' disk under the 'thumbnails' folder
        $path = $request->file('thumbnail')->store('thumbnails', 'public');

        // Save the new file path (public URL)
        $book->thumbnail = Storage::url($path);
    }

    // Save the updated book record
    $book->save();

    return redirect()->route('admin.books.index')->with('success', 'Book updated successfully!');
}



    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Delete thumbnail from storage
        if ($book->thumbnail) {
            Storage::delete($book->thumbnail);
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully!');
    }

    public function home()
{
    // Fetch the featured books from the database
        $featuredBooks = Book::with('promotions')->where('featured', true)->get();

    // Return the homepage view and pass the featured books to it
    return view('home', compact('featuredBooks'));
}

public function featured()
{
    $books = Book::where('featured', true)->get();
    return view('admin.books.featured', compact('books'));
}
public function removeFeatured($id)
{
    $book = Book::findOrFail($id);
    $book->featured = false;
    $book->save();

    return redirect()->route('admin.books.featured')->with('success', 'Book removed from featured list.');
}

}
