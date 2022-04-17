<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Support\Facades\View;

class ProviderController extends Controller
{

    public function index()
    {
        $providers=Provider::all();
        return view('admin.providers.index', compact('providers'));
    }

    public function create()
    {
        return View('admin.providers.create');
    }

    public function store(StoreProviderRequest $request)
    {
        $provider = Provider::create($request->all());
        return redirect()->route('admin.providers.edit', $provider)
            ->with('info', 'El proveedor se registro con éxito');
    }

    public function show(Provider $provider)
    {
        $products=Product::where('provider_id',$provider->id)
            ->latest('id')
            ->get();;
        return view('admin.providers.show', compact('provider','products'));
    }

    public function edit(Provider $provider)
    {
        return view('admin.providers.edit',compact('provider'));
    }

    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        
        $provider->update($request->all());

        return redirect()->route('admin.providers.edit', $provider)
        ->with('info', 'El proveedor se actualizó con éxito');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();

        return redirect()->route('admin.providers.index')
            ->with('info', 'El proveedor se eliminó con éxito');
    }
}
