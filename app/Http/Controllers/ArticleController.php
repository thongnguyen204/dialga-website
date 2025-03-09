<?php
namespace App\Http\Controllers;

use App\Http\Requests\ArticlePostRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
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
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created article in DB.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(ArticlePostRequest $request): View
    {
        $this->articleRepository->create($request->getParams());
        $articles = $this->articleRepository->paginate();

        return view('article.index')->with('articles', $articles);
    }

    /**
     * Display the specified article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

    }

    /**
     * Show the form for editing the specified article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit')->with('article', $article);
    }

    /**
     * Update the specified article in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

    }
}
