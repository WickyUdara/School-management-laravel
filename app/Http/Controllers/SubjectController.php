<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Auth;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list',$data);
    }

    public function add()
    {

        $data['header_title'] = "Add Subject";
        return view('admin.subject.add',$data);

    }

    public function Insert(Request $request)
    {
        $save = new SubjectModel;
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->id;

        $save->save();

        return redirect('admin/subject/list')->with('success',"Subject Successfully created!");
    }

    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingleRecord($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'Edit Subject';
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $save = SubjectModel::getSingleRecord($id);
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->type = trim($request->type);
        $save->save();

        return redirect('admin/subject/list')->with('success',"Subject Updated Successfully");

    }
    public function  delete($id)
    {
        $save = SubjectModel::getSingleRecord($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success',"Subject Deleted Successfully");

    }
}
