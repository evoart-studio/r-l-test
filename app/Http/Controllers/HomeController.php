<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\FilterGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::stockProducts()->get();
        $filters = FilterGroup::all();

        return view('home', compact('products', 'filters'));
    }

    public function catalog(Request $request)
    {
        $this->validate($request, [
            'sort' => 'required|alpha',
            'order' => 'required|alpha',
            'filter' => 'array',
            'filter.*' => 'integer',
        ]);

        $sort = $request->get('sort');
        $order = $request->get('order');

        $filters = FilterGroup::all();

        $products = Product::stockProducts();
        $products = $products->orderBy($sort, $order);

        if ( $request->has('filter') ) {
            foreach ( $request->get('filter') as $attribute_id ) {
                $products = $products->whereHas('attributes', function (Builder $query) use ($attribute_id) {
                    $query->where('id', $attribute_id);
                });
            }
        }

        $products = $products->get();

        return view('home', compact('products', 'filters'));
    }
}
