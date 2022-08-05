<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    private static $student;
    use HasFactory;
    public static function newStudent($request)
    {
        self::$student = new Student();
        self::$student->name = $request->name;
        self::$student->email = $request->email;
        self::$student->password = bcrypt($request->password);;
        self::$student->mobile = $request->mobile;
        self::$student->save();

        return self::$student;

    }
}
