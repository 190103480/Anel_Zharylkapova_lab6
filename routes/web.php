  
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/insert', function () {
    DB::insert("insert into Students(name, date_of_birth, GPA, advisor)values('Anel', '2002-01-18', 3.27, 'Zhangir')");
});

Route::get('/select', function() {
    $select = DB::select('select * from Students where id=1');
    foreach($select as $students){
        echo "Name : ".$students->name;
        echo "Date of birth : ".$students->date_of_birth;
        echo "GPA : ".$students->GPA;
        echo "Advisor : ".$students->advisor;
    }
});

Route::get('/update', function(){
    $update=DB::update('update Students set name="Dariya" where id=2');
    return $update;
});

Route::get('/delete', function(){
    $delete=DB::delete('delete from Students where id=3');
    return $delete;
});

Route::get('/find', function(){
    $students=Student::where('id', 1)->first();
    return $students;
});

Route::get('/secondinsert', function(){
    $student=new Student;
    $student->name='Daniyal';
    $student->date_of_birth='2000-01-08';
    $student->GPA=3.5;
    $student->advisor='Marzhan';
    $student->save();
});

Route::get('/secondupdate', function(){
    $student=Student::find(3);
    $student->name='Daniyar';
    $student->date_of_birth='1999-01-15';
    $student->GPA=2.29;
    $student->advisor='Mariya';
    $student->save();
});

Route::get('/seconddelete', function(){
    $student=Student::find(7);
    $student->delete();
});

