<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;
class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['header_title'] = "Class List";
        return view('admin.class.list',$data);
    }
    public function add()
    {
        $data['header_title'] = "Add Class";
        return view('admin.class.add',$data);
    }
    public function insert(Request $request)
    {

        $save = new ClassModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect(url('admin/class/list'))->with('success',"Class Successfully Created");

    }

    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getSingleRecord($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'Edit Class';
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id,Request $request)
    {
        $save = ClassModel::getSingleRecord($id);
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->save();

        return redirect('admin/class/list')->with('success', "Class Successfully Updated");
    }

    public function delete($id)
    {
        $save = ClassModel::getSingleRecord($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Class Successfully Deleted");
    }


}
