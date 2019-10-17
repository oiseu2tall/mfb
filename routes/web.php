<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes(['register' => false]);

Route::resource('customers','CustomerController')->middleware('auth');
Route::resource('groups','GroupController')->middleware('auth');
Route::resource('loans','LoanController')->middleware('auth');
Route::resource('credits','CreditController')->middleware('auth');
Route::resource('repayments','RepaymentController')->middleware('auth');
Route::resource('users','UserController')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::put('/register/update/{id}','RegisterController@update');
//Route::post('/register/edit/{id}','RegisterController@edit');

Route::any('/search',function(){

    $q = Request::get ( 'q' );
    $result = DB::table('customers', 'groups')->select('customers.id','surname', 'middle_name', 'first_name','aka','name', 'groups.id as groupid')->join('groups', 'groups.id', '=', 'customers.group_id')->where('surname','LIKE','%'.$q.'%')->orWhere('middle_name','LIKE','%'.$q.'%')->orWhere('first_name','LIKE','%'.$q.'%')->get();
    if(count($result) > 0)
        return view('search')->withDetails($result)->withQuery ( $q );
    else return view ('search')->withMessage('No Details found. Try to search again !');
});

/**


Route::any('/search',function(){

    $q = Request::get ( 'q' );
    $result = DB::table('customers', 'groups')->where('surname','LIKE','%'.$q.'%')->orWhere('middle_name','LIKE','%'.$q.'%')->orWhere('first_name','LIKE','%'.$q.'%')->get();
    if(count($result) > 0)
        return view('search')->withDetails($result)->withQuery ( $q );
    else return view ('search')->withMessage('No Details found. Try to search again !');
});
Route::any('/search', 'CustomerController@search')->name('search');

Route::any('/search',function(){
	$r = Request::get ( 'q' );
    //$q = Request::get ( 'q' );
   $q= explode(" ", $_POST['q']);
   //$q = explode(" ", $r);
    $result = DB::table('customers');
   for($i = 0; $i < count($q); $i++)
    $result .= "->where('surname','LIKE','%'.$q[$i].'%')->orWhere('middle_name','LIKE','%'.$q[$i].'%')->orWhere('first_name','LIKE','%'.$q[$i].'%')->get()";
    if(count($result) > 0)
        return view('welcome')->withDetails($result)->withQuery ( $q[0] );
    else return view ('welcome')->withMessage('No Details found. Try to search again !');
});





Route::any('/keyword',function(){



if(!empty($_POST))
{
      $aKeyword = explode(" ", $_POST['keyword']);
      $query ="SELECT * FROM table1 WHERE field1 like '%" . $aKeyword[0] . "%'";
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR field1 like '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $result = $db->query($query);
     echo "<br>You have searched for keywords: " . $_POST['keyword'];
                     
     if(mysqli_num_rows($result) > 0) {
        $row_count=0;
        echo "<br>Result Found: ";
        echo "<br><table border='1'>";
        While($row = $result->fetch_assoc()) {   
            $row_count++;                         
            echo "<tr><td> ROW ".$row_count." </td><td>". $row['field1'] . "</td></tr>";
        }
        echo "</table>";
    }
    else {
        echo "<br>Result Found: NONE";
    }
}



});
**/