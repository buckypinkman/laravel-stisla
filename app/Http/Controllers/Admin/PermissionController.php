<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    protected $module;
    protected $model;

    public function __construct(Permission $permission)
    {
        $this->module = 'admin.permission';
        $this->model = $permission;
        FacadesView::share('module', $this->module);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->model->latest();
            return DataTables::of($data)->make();
        }

        return view('pages.'.$this->module.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): View
    {
        return view('pages.'.$this->module.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request): RedirectResponse
    {
        $permission = $this->model->create($request->all());
        Alert::success('Success', 'Success Create');

        return to_route($this->module.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id): void
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id): View
    {
        $permission = $this->model->findOrFail($id);
        return view('pages.'.$this->module.'.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $permission = $this->model->find($id);
        $permission->update($request->all());

        return to_route($this->module.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id): RedirectResponse
    {
        $permission = $this->model->find($id);
        $permission->delete();

        Alert::success('Success', 'Success Delete');

        return to_route($this->module.'.index');
    }
}
