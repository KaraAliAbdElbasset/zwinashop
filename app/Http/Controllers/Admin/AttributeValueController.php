<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    public function index()
    {
        $values = AttributeValue::with('attribute')->orderByDesc('created_at')->paginate(10);
        return view('admin.attributes.index',compact('values'));
    }

    public function create()
    {
        $atts = Attribute::all();
        $attribute = new AttributeValue();
        return view('admin.attributes.create',compact('atts','attribute'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'attribute_id' => 'required|integer|gt:0',
            'name' => 'required|string',
        ]);
        $data['display_name'] = $data['name'];
        AttributeValue::create($data);

        session()->flash("success","Attribute Value Has Been Created successfully");
        return redirect()->route('admin.attributes.index');

    }

    public function edit(AttributeValue $attribute)
    {
        $atts = Attribute::all();
        return view('admin.attributes.edit',compact('atts','attribute'));
    }

    public function update(AttributeValue $attribute,Request $request)
    {
        $data = $request->validate([
            'attribute_id' => 'required|integer|gt:0',
            'name' => 'required|string',
        ]);
        $attribute->update($data);
        session()->flash("success","Attribute Value Has Been Updated successfully");
        return redirect()->route('admin.attributes.index');
    }

    public function destroy(AttributeValue $attribute)
    {
        $attribute->delete();
        session()->flash("sucscess","Attribute Value Has Been Deleted successfully");
        return redirect()->route('admin.attributes.index');
    }
}
