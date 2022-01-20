<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function allByStorage(int $id)
    {
        $productsByStorage = Product::where('storage_id', '=', $id)->get();

        return $productsByStorage;
    }

    public function storageView(Request $request)
    {
        $id = $request->id;

        $data =  $this->allByStorage($id);

        return view('storage', [
            'id' => $id,
            'data' => $data,
            'storage' => Storage::find($id)->name,
        ]);
    }

    public function viewSingleProduct($id)
    {
        $product = Product::find($id);

        return view('singleProduct', ['product' => $product, 'id' => $id]);
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $storageId = $product->storage_id;

        $product->storage()->dissociate();
        $product->delete();

        return redirect()->route('storage', $storageId);
    }

    public function add(AddProductRequest $request): RedirectResponse
    {
        $product = new Product();
        $product->user_id = $request->user()->id;
        $product->storage_id = $request->input('storages');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->expired_at = $request->input('expired_at');

        $product->save();

        return redirect()->route('storage', ['id' => $product->storage_id]);
    }

    public function makeAddView()
    {
        $storages = Storage::pluck('name', 'id');

        return view('addProduct')
            ->with(compact('storages' ));
    }

    public function makeMainView()
    {
        $expiredProducts = $this->expiredProducts();
        $expiredSoon = $this->expiredSoon();
        $longTimeAgo = $this->longTimeAgo();

        return view('home', [
            'expiredProducts'  => $expiredProducts,
            'expiredSoon' => $expiredSoon,
            'longTimeAgo' => $longTimeAgo
        ]);
    }

    public function expiredProducts()
    {
        return Product::where('expired_at', '<', Carbon::now())->get();
    }

    public function expiredSoon()
    {
        return Product::where('expired_at', '>', Carbon::now())
            ->where('expired_at', '<=', Carbon::now()->addDays(3))->get();
    }

    public function longTimeAgo()
    {
        return Product::where('created_at', '<', Carbon::now()->subMonths(6))->get();
    }
}
