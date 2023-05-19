<?php

namespace App\Http\Controllers;

use App\Models\Talle;
use Illuminate\Http\Request;

/**
 * Class TalleController
 * @package App\Http\Controllers
 */
class TalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talles = Talle::paginate();

        return view('talle.index', compact('talles'))
            ->with('i', (request()->input('page', 1) - 1) * $talles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $talle = new Talle();
        return view('talle.create', compact('talle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Talle::$rules);

        $talle = Talle::create($request->all());

        return redirect()->route('talles.index')
            ->with('success', 'Talle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $talle = Talle::find($id);

        return view('talle.show', compact('talle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $talle = Talle::find($id);

        return view('talle.edit', compact('talle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Talle $talle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Talle $talle)
    {
        request()->validate(Talle::$rules);

        $talle->update($request->all());

        return redirect()->route('talles.index')
            ->with('success', 'Talle updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $talle = Talle::find($id)->delete();

        return redirect()->route('talles.index')
            ->with('success', 'Talle deleted successfully');
    }
}
