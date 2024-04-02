<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NavigationRequest;
use App\Models\Navigation;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $navigations = Navigation::all();

        return view('admin.navigation.index',['navigations' => $navigations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $navigations = Navigation::all();

        $roles = Role::all();

        return view('admin.navigation.create',compact(['navigations','roles']));
    }

    /**
     * @param  \App\Http\Requests\NavigationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(NavigationRequest $request)
    {
        $data = $request->validated();

        $nav = Navigation::create($data);

        if (array_key_exists('roles',$data)){
            $this->storeRoles($nav->id, $data['roles']);
        }

        return redirect()->route('navigation.index')->with('success', 'Успешно добавлен')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param \App\Models\Navigation $navigation
     */

    public function edit(Navigation $navigation)
    {
        $navigations = Navigation::all();

        $rolesId = $navigation->roles->pluck('RoleID')->toArray();

        $roles = Role::all();

        return view('admin.navigation.edit', compact(['navigations','navigation','roles','rolesId']));
    }

    /**
     * @param  \App\Http\Requests\NavigationRequest $request
     * @param \App\Models\Navigation $navigation
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(NavigationRequest $request, Navigation $navigation)
    {
        $data = $request->validated();

        $navigation->update($data);

        $existingIds = $navigation->roles()->pluck('RoleID')->toArray();

        $toDelete = array_values(array_diff($existingIds, $data['roles']));
        $toAdd = array_values(array_diff($data['roles'], $existingIds));

        $navigation->roles()->detach($toDelete);

        if (!empty($toAdd)){
            $this->storeRoles($navigation->id, $toAdd);
        }

        return redirect()->route('navigation.index')->with('success', 'Успешно изменен')->withInput();
    }

    /**
     * @param \App\Models\Navigation $navigation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Navigation $navigation)
    {
        $navigation->delete();

        return redirect()->route('navigation.index')->with('success', 'Успешно удален');
    }

    public function storeRoles($navigation_id,$roles){
        foreach ($roles as $role){
            DB::table('navigation_roles')->insert([
                'navigation_id' => $navigation_id,
                'role_id' => $role
            ]);
        }
    }

}
