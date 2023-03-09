<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $view;
    protected $model;

    public function __construct(User $user)
    {
        $this->view = 'pages.admin.user';
        $this->model = $user;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index(): View
    {
        return view($this->view.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): View
    {
        return view($this->view.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request): RedirectResponse
    {
        User::create($request->all());
        return to_route('admin.user.create');
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
        $user = User::find($id);
        return view($this->view.'.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::find($id);
        $user->update($request->all());

        return to_route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->destroy();
        return to_route('admin.user.index');
    }
}
