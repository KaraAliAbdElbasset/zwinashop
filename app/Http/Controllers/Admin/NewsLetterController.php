<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $emails   =   app(Pipeline::class)
            ->send(NewsLetter::orderBy('created_at','desc')->newQuery())
            ->through([
                \App\QueryFilter\Search::class,
            ])
            ->thenReturn()
            ->paginate(10)
            ->appends(request()->query());
        return view('admin.newsletter.index',compact('emails'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email|unique:news_letters,email'
        ]);
        NewsLetter::create($data);
        session()->flash('success','Thank you for your subscription');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsLetter  $newsLetter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            NewsLetter::destroy($id);
            session()->flash('success','Email Has Been Deleted Successfully');
            return redirect()->route('admin.newsletter.index');
        }catch (\Exception $exception)
        {
            session()->flash('success','Oops! Something went wrong please try again');
            return redirect()->route('admin.newsletter.index');
        }
    }
}
