<?php

namespace App\Http\Controllers;

use App\Reactions;
use Illuminate\Http\Request;

class ReactionsController extends Controller
{
    private $model;
    private $module;
    private $controller;

    public function __construct(Reactions $reactions)
    {
        $this->model = $reactions;
        $this->module = 'reactions';
        $this->controller = 'ReactionsController';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->model::latest('updated_at')->get();

        return view('admin.' . $this->module . '.index', compact('items'))
            ->with('module', $this->module)
            ->with('controller', $this->controller);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.' . $this->module . '.create')
            ->with('module', $this->module)
            ->with('controller', $this->controller);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->model::rules());

        $this->model::create($request->all());

        return back()->withSuccess(trans('app.success_store'))
            ->with('module', $this->module)
            ->with('controller', $this->controller);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->model::findOrFail($id);

        return view('admin.' . $this->module . '.edit', compact('item'))
            ->with('module', $this->module)
            ->with('controller', $this->controller);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->model::rules(true, $id));

        $item = $this->model::findOrFail($id);

        $item->update($request->all());

        return redirect()->route(ADMIN . '.' . $this->module . '.index')
            ->withSuccess(trans('app.success_update'))
            ->with('module', $this->module)
            ->with('controller', $this->controller);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'))
            ->with('module', $this->module)
            ->with('controller', $this->controller);
    }
}
