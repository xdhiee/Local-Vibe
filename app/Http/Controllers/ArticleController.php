<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of published articles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch published articles, ordered by latest, with pagination
        $articles = Article::whereNotNull('published_at')
            ->with(['category', 'region']) // Eager load relationships if they exist
            ->latest('published_at')
            ->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Display a single article by its slug.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show($slug)
    {
        // Fetch the article by slug, ensuring it's published
        $article = Article::where('slug', $slug)
            ->whereNotNull('published_at')
            ->with(['category', 'region']) // Eager load relationships if they exist
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }
}
