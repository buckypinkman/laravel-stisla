<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    protected $module;
    protected $model;

    public function __construct(User $user)
    {
        $this->module = 'admin.user';
        $this->model = $user;
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
        $user = $this->model->create($request->all());
        // $user->assignRole($request->role);
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
        $user = $this->model->findOrFail($id);
        return view('pages.'.$this->module.'.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $user = $this->model->find($id);
        $data = $request->all();

        if(isEmpty($request->password)) unset($data['password']);

        $user->update($data);
        Alert::success('Success', 'Success Update');

        return to_route($this->module.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id): RedirectResponse
    {
        $user = $this->model->find($id);
        $user->delete();

        Alert::success('Success', 'Success Delete');

        return to_route($this->module.'.index');
    }
}
