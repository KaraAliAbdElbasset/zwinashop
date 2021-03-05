<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Traits\UploadAble;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use UploadAble;
    /**
     * @var ProductContract
     */
    protected $productRepository;

    /**
     * ImageController constructor.
     * @param ProductContract $productRepository
     */
    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $product = $this->productRepository->findOneById($request->product_id);
        if ($request->has('image')) {

            $image = $this->uploadOne($request->image, 'product');

            $productImage = [
                'path'      =>  $image,
            ];
            $product->images()->create($productImage);
        }

        return response()->json(['status' => 'Success']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Image $image
     * @return RedirectResponse
     */
    public function destroy(Image $image): RedirectResponse
    {

        try {
            if ($image->path !== '') {
                $this->deleteOne($image->path);
            }
            $image->delete();
            session()->flash("success","image has been deleted successfully");
        }catch(\Exception $exception){
            session()->flash("error","Oops!!! something Wrong ");
        }

        return redirect()->back();
    }
}
