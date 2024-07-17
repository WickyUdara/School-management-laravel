<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table="class_subjects";
    static public function getRecord()
    {
        return self::select('class_subjects.*','class.name as class_name','subject.name as subject_name','users.name as created_by_name')
        ->join('subject','subject.id','=','class_subjects.subject_id')
        ->join('class','class.id','=','class_subjects.class_id')
        ->join('users','users.id','=','class_subjects.create_by')



       ->orderBy('class_subjects.id','desc')
        ->paginate(20);


    }

    static public function getAlreadyFirst($class_id,$subject_id)
    {
        return self::where('class_id','=',$class_id)->where('subject_id','=',$subject_id)->first();
    }

    static public function getSubjectID($class_id)
    {
        return self::where('class_id','=',$class_id)->where("is_delete",'=',0)->get();
    }

    static public function deleteSubject($class_id)
    {
        return self::where('class_id',$class_id)->delete();
    }
}
