<?php
namespace App\Http\Controllers;

use App\Http\Requests\ArticlePostRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * ArticleController constructor
     * @package App\Http\Controllers
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the articles.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $articles = $this->articleRepository->paginate();

        return view('article.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new article.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('article.create');
    }

    /**
     * Store a newly created article in DB.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticlePostRequest $request): RedirectResponse
    {
        $article = $this->articleRepository->create($request->getParams());

        return to_route('articles.show', [$article]);
    }

    /**
     * Display the specified article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article): View
    {
        return view('article.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\View\View
     */
    public function edit(Article $article): View
    {
        return view('article.edit')->with('article', $article);
    }

    /**
     * Update the specified article in DB.
     *
     * @param  \App\Http\Requests\ArticlePostRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticlePostRequest $request, Article $article): RedirectResponse
    {
        $article = $this->articleRepository->update($article, $request->getParams());

        return to_route('articles.show', [$article]);
    }

    /**
     * Remove the specified article from DB.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        $this->articleRepository->destroy($article);

        return to_route('articles.index');
    }
}
