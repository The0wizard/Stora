<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::with('book')
            ->orderByDesc('is_active')
            ->orderByDesc('starts_at')
            ->paginate(15);

        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        $books = Book::orderBy('title')->get();
        return view('admin.promotions.create', compact('books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'book_id'          => 'required|exists:books,id',
            'discount_type'    => 'required|in:percentage,fixed',
            'discount_value'   => 'required|numeric|min:0.01',
            'starts_at'        => 'required|date',
            'ends_at'          => 'required|date|after:starts_at',
            'is_active'        => 'nullable|boolean',
        ]);

        // Vérifications métier
        if ($validated['discount_type'] === 'percentage' && $validated['discount_value'] > 99) {
            return back()->withErrors(['discount_value' => 'Le pourcentage ne peut pas dépasser 99%.'])->withInput();
        }

        if ($validated['discount_type'] === 'fixed') {
            $book = Book::findOrFail($validated['book_id']);
            if ($validated['discount_value'] >= $book->price) {
                return back()->withErrors(['discount_value' => 'La réduction ne peut pas être supérieure ou égale au prix du livre.'])->withInput();
            }
        }

        $validated['is_active'] = $request->boolean('is_active');

        Promotion::create($validated);

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promotion créée avec succès !');
    }

    public function edit(Promotion $promotion)
    {
        $books = Book::orderBy('title')->get();
        return view('admin.promotions.edit', compact('promotion', 'books'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'book_id'          => 'required|exists:books,id',
            'discount_type'    => 'required|in:percentage,fixed',
            'discount_value'   => 'required|numeric|min:0.01',
            'starts_at'        => 'required|date',
            'ends_at'          => 'required|date|after:starts_at',
            'is_active'        => 'nullable|boolean',
        ]);

        if ($validated['discount_type'] === 'percentage' && $validated['discount_value'] > 99) {
            return back()->withErrors(['discount_value' => 'Le pourcentage ne peut pas dépasser 99%.'])->withInput();
        }

        if ($validated['discount_type'] === 'fixed') {
            $book = Book::findOrFail($validated['book_id']);
            if ($validated['discount_value'] >= $book->price) {
                return back()->withErrors(['discount_value' => 'La réduction ne peut pas dépasser le prix du livre.'])->withInput();
            }
        }

        $validated['is_active'] = $request->boolean('is_active');

        $promotion->update($validated);

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promotion mise à jour !');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promotion supprimée.');
    }

    /**
     * Toggle rapide (activer/désactiver)
     */
    public function toggle(Promotion $promotion)
    {
        $promotion->is_active = !$promotion->is_active;
        $promotion->save();
        return back()->with('success', 'Statut de la promotion modifié.');
    }
}
