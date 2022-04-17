<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.edit')->only('edit');
        $this->middleware('can:admin.tags.create')->only('create');
        $this->middleware('can:admin.tags.destroy')->only('destroy');

    }

    public function index()
    {
        $tags=Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $colores=[
            'yellow'=>'Amarillo',
            'orange'=>'Naranja',
            'red'=>'Rojo',
            'pink'=>'Rosa',
            'fuchsia'=>'Fuchsia',
            'purple'=>'Purpura',
            'blue'=>'Azul',
            'green'=>'Verde',
            'teal'=>'Teal',
        ];

        return view('admin.tags.create', compact('colores'));
    }

    public function store(Request $request)
  {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:tags',
            'color'=>'required'
        ]) ;     
        
        $tag=Tag::create($request->all());

        return redirect()->route('admin.tags.edit', compact('tag'))
            ->with('info', 'La etiqueta se creó con éxito');
    }

    public function edit(Tag $tag)
    {
        $colores=[
            'yellow'=>'Amarillo',
            'orange'=>'Naranja',
            'red'=>'Rojo',
            'pink'=>'Rosa',
            'fuchsia'=>'Fuchsia',
            'purple'=>'Purpura',
            'blue'=>'Azul',
            'green'=>'Verde',
            'teal'=>'Teal',
        ];

        return view('admin.tags.edit', compact('tag','colores'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:tags,slug,$tag->id",
            'color'=>'required'
        ]) ;  

        $tag->update($request->all());

        return redirect()->route('admin.tags.edit', $tag)
            ->with('info', 'La etiqueta se actualizó con éxito');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')
            ->with('info', 'La etiqueta se elimino con éxito');
    }
}
