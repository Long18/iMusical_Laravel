<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class TypesAdminController extends Controller
{
    public function all_types()
    {
        $all_types = DB::table('types')->get();
        $manager_types = view('admin.sub.all_types')->with('all_types', $all_types);
        return view('admin.main.admin_layout')->with('admin.sub.all_types', $manager_types);
    }

    public function add_type()
    {
        return view('admin.sub.add_type');
    }

    public function save_type(Request $request)
    {
        $data = array();

        $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;


        DB::table('types')->insert($data);

        Session::put('messenge', 'Your type was added!!');
        return Redirect::to('admin/add-type');
    }

    public function edit_type($type_id)
    {
        $all_types = DB::table('types')->where('type_id', $type_id)->get();
        $manager_types = view('admin.edit_type')->with('edit_type', $all_types);
        Session::put('messenge', 'Your type was edited!!');
        return view('admin_layout')->with('admin.edit_type', $manager_types);
    }

    public function update_type(Request $request, $type_id)
    {
        $data = array();
        $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;
        // $data['name'] = $request->val_name_type;

        DB::table('types')->where('type_id', $type_id)->update($data);
        Session::put('messenge', 'Your type was updated!!');
        return Redirect::to('admin/all-types');
    }

    public function delete_type($type_id)
    {
        DB::table('types')->where('type_id', $type_id)->delete();
        Session::put('messenge', 'Your type was deleted!!');
        return Redirect::to('admin/all-types');
    }
}
