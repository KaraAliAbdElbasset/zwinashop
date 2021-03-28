<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Traits\UploadAble;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    use UploadAble;
    public function index()
    {
        $images = Carousel::orderBy('created_at','desc')->paginate(10);
        return view('admin.images.index',compact('images'));
    }

    public function create()
    {
        $c = new Carousel();
        return view('admin.images.create',compact('c'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|file|image|max:5000',
        ]);

        $data['image'] = $this->uploadOne($data['image']);
        $data['state'] = $request->has('state');

        Carousel::create($data);
        session()->flash('success','Image Has been created successfully');
        return redirect()->route('admin.carousel.index');
    }

    public function edit(Carousel $carousel)
    {
        return view('admin.images.edit',['c' => $carousel]);
    }

    public function update(Carousel $carousel,Request $request)
    {
        $data = $request->validate([
            'image' => 'sometimes|nullable|file|image|max:5000',
        ]);

        if($request->hasFile('image'))
        {
            $this->deleteOne($carousel->image);
            $data['image'] = $this->uploadOne($data['image']);
        }

        $data['state'] = $request->has('state');
        $carousel->update($data);
        session()->flash('success','Image Has been updated successfully');
        return redirect()->route('admin.carousel.index');
    }

    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
        session()->flash('success','Image Has been deleted successfully');
        return redirect()->route('admin.carousel.index');
    }
}
