<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('user_id', auth()->user()->id)->get();
        $categories = Category::all();
        return view('pages.news', compact(['news', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|file|max:5120'
        ]);
        $validateData['user_id'] = auth()->user()->id;
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('news-image');
        }
        News::create($validateData);
        return redirect('/news')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news = $news;
        return view('pages.detail-news', compact(['news']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $news = $news;
        $categories = Category::all();
        return view('pages.edit-news', compact(['news', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:5120',
        ]);
        $validateData['user_id'] = auth()->user()->id;
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('news-image');
        }
        $news = $news;
        $news->update($validateData);
        return redirect('/news')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news = $news;
        if ($news->image) {
            Storage::delete($news->image);
        }
        $news->delete();
        return redirect('/news')->with('success', 'Data berhasil di Hapus');
    }
}
