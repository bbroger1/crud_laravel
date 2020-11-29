<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaraDev\Property;

class PropertyController extends Controller
{
    public function index()
    {
        //$properties = DB::select('select * from properties');
        $properties = Property::all();

        return view('property.index')->with('properties', $properties);
    }

    public function show($uri)
    {
        //$property = DB::select('select * from properties where uri = ?', [$uri]);
        $property = Property::where('uri', $uri)->get();

        if (!empty($property)) {
            return view('property.show')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }

    public function create()
    {
        return view('property.create');
    }

    public function store(Request $request)
    //Request é utilizado para tratar as requisições da aplicação
    {
        $propertySlug = $this->setUri($request->title);

        /*$property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price
        ];

        DB::insert('insert into properties (title, uri, description, rental_price, sale_price)
                    values (?, ?, ?, ?, ?)', $property);*/

        $property = [
            'title' => $request->title,
            'uri' => $propertySlug,
            'description' => $request->description,
            'rental_price' => $request->rental_price,
            'sale_price' => $request->sale_price
        ];

        Property::create($property);

        return redirect()->action('PropertyController@index');
    }

    public function edit($uri)
    {
        //$property = DB::select('select * from properties where uri = ? limit 1', [$uri]);
        $property = Property::where('uri', $uri)->get();

        if (!empty($property)) {
            return view('property.edit')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }

    public function update(Request $request, $id)
    {
        $propertySlug = $this->setUri($request->title);

        /*$property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $id
        ];

        DB::update('update properties
                    set title = ?,
                        uri = ?,
                        description = ?,
                        rental_price = ?,
                        sale_price = ?
                    where id = ?', $property);*/

        //pesquisa o item a ser alterado
        $property = Property::find($id);
        //seta os dados do item que serão alterados
        $property->title = $request->title;
        $property->uri = $propertySlug;
        $property->description = $request->description;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;

        $property->save();

        return redirect()->action('PropertyController@index');
    }

    public function destroy($uri)
    {
        //$property = DB::select('select * from properties where uri = ? limit 1', [$uri]);
        $property = Property::where('uri', $uri)->get();

        if (!empty($property)) {
            DB::delete('delete from properties where uri = ?', [$uri]);
        };

        return redirect()->action('PropertyController@index');
    }

    private function setUri($title)
    {
        $propertySlug = str_slug($title);

        //$properties = DB::select('select * from properties');
        $properties = Property::all();

        $count = 0;
        foreach ($properties as $property) {
            if (str_slug($property->title) === $propertySlug) {
                $count++;
            }
        }

        if ($count > 0) {
            $propertySlug = $propertySlug . '-' . $count;
        }

        return $propertySlug;
    }
}
