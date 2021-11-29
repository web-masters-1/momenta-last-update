<?php

namespace App\Http\Controllers\Application;

use App\Base\Services\SitemapService;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use DB;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    // public function getIndex()
    // {
    //     return view('app.articles', [
    //         'title' => getTitle(),
    //         'description' => getDescription(),
    //         'articles' => Article::published()->paginate(4)
    //     ]);
    // }
    //

    public function getIndex()
    {
        return view('site.index', [
            'title' => getTitle(),
            'description' => getDescription(),
            'articles' => Article::published()->paginate(4),
            'services' => Page::where('parent_id', 19)->take(8)->get(), // pages with parent service
            'sliders' => DB::table('sliders')->where('status', 1)->get(),
            'sections' => DB::table('sections')->get(),
            'feedbacks' =>  DB::table('comments')
                ->join('pages', 'comments.page_id', '=', 'pages.id')
                ->select('comments.*', 'pages.title')
                ->where('comments.status', 1)
                ->get()
        ]);
    }

    /**
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory(Category $category)
    {
        return view('app.articles', [
            'title' => $category->title,
            'description' => $category->description,
            'articles' => Article::where('category_id', $category->id)->paginate(4)
        ]);
    }

    /**
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPage(Page $page)
    {
      if($page->slug == 'contact-us'){
        return view('site.contact');
      }
      if($page->slug == 'offer-request'){
        return view('site.offer');
      }
      $comments = DB::table('comments')->where('page_id',$page->id)->get();
      //dd($comments);
        return view('site.page', ['post' => $page,'comments'=>$comments]);
    }

    /**
     * @param \App\Models\Article $article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticle(Article $article)
    {
        return view('app.content', ['object' => $article]);
    }

    /**
     * @param \App\Base\Services\SitemapService $sitemapService
     *
     * @return mixed
     * @throws \Exception
     */
    public function getSitemap(SitemapService $sitemapService)
    {
        return $sitemapService->render();
    }
}
