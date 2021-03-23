<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeProduct;
use App\Traits\UploadAble;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProductAttributeController extends Controller
{
    use UploadAble;
    /**
     * @return JsonResponse
     */
    public function loadAttributes(): JsonResponse
    {
        $attributes = Attribute::all();

        return response()->json($attributes);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function productAttributes(Request $request): JsonResponse
    {
        $product_attributes = AttributeProduct::where('product_id',$request->id)->get();
        return response()->json($product_attributes);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function loadValues(Request $request): JsonResponse
    {
        $attribute = Attribute::findOrFail($request->id);

        return response()->json($attribute->values);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addAttribute(Request $request): JsonResponse
    {
        $data = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'attribute_id' => 'required|integer|exists:attributes,id',
            'attribute_value_id' => 'required|integer|exists:attribute_values,id',
            'image' => 'sometimes|nullable|file|image|max:5000',
            'price' => 'sometimes|nullable|numeric|gte:0',
            'value' => 'required|string',
            'attribute' => 'required|string',
        ]);

        if (array_key_exists('image',$data) && $data['image'] instanceof UploadedFile)
        {
            $data['image'] = $this->uploadOne($data['image'],'product/attribute/image','public');
        }

        $productAttribute = AttributeProduct::create($data);

        if ($productAttribute) {
            return response()->json([
                'message' => 'Product attribute added successfully.'
            ]);
        }

        return response()->json(['message' => 'Something went wrong while submitting product attribute.']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAttribute(Request $request): JsonResponse
    {
        try {
            $productAttribute = AttributeProduct::findOrFail($request->id);
            if ($productAttribute->image)
            {
                $this->deleteOne($productAttribute->image);
            }
            $productAttribute->delete();
        }catch (\Exception $exception)
        {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product attribute deleted successfully.',
            'data' => ""
        ]);

    }
}
