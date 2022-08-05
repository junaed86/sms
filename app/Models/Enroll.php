<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Enroll extends Model
{
    private static $enroll;
    use HasFactory;
    public static function newEnroll($request, $studentID, $courseId)
    {
        self::$enroll = new Enroll();
        self::$enroll->course_id = $courseId;
        self::$enroll->student_id = $studentID;
        self::$enroll->enroll_date = date('Y-m-d');
        self::$enroll->enroll_timestamp = strtotime(date('Y-m-d'));
        self::$enroll->payment_type = $request->payment_type;
        self::$enroll->save();
        return self::$enroll;
    }
}
