<?php

namespace App\Http\Controllers\Admin;

use App\SiteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class SiteUsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }

        $site_users = SiteUser::all();

        return view('admin.site_users.index', compact('site_users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $users = SiteUser::all();
        return view('admin.site_users.create',compact('users'));
    }


    public function store(Request $request)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        SiteUser::create($request->all());

        return redirect()->route('admin.site_users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $user = SiteUser::findOrFail($id);
        return view('admin.site_users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $user = SiteUser::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.site_users.index');
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $users = SiteUser::findOrFail($id);
        $users->delete();

        return redirect()->route('admin.site_users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = SiteUser::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
