<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Welcome screen
Route::get('/', 'WelcomeController@getIndex');

Route::group(['middleware' => 'auth'], function () {
    // Activity routes
    Route::get('/activities/create', 'ActivityController@getCreate');
    Route::post('/activities/create', 'ActivityController@postCreate');

    Route::get('/activities/edit/{id?}', 'ActivityController@getEdit');
    Route::post('/activities/edit', 'ActivityController@postEdit');

    Route::get('/activities', 'ActivityController@getIndex');
    Route::get('/activities/show/{id?}', 'ActivityController@getShow');

    Route::get('/activities/confirm-delete/{id?}', 'ActivityController@getConfirmDelete');
    Route::get('/activities/delete/{id?}', 'ActivityController@getDoDelete');

    // Schedule Routes
    Route::get('/schedules/confirm-delete/{id?}', 'ScheduleController@getConfirmDelete');
    Route::get('/schedules/delete/{id?}', 'ScheduleController@getDoDelete');

    Route::post('/schedules/create', 'ScheduleController@postCreate');

    Route::post('/schedules/edit', 'ScheduleController@postEdit');

    Route::get('/schedules', 'ScheduleController@getIndex');
    Route::get('/schedules/show/{id?}', 'ScheduleController@getShow');

    Route::get('/schedules/getCalendar/{schedule_id?}', 'ScheduleController@getCalendar');
    Route::get('/schedules/calendar/{schedule_id?}', 'ScheduleController@showCalendar');
});
// Login and register

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');


// Debugging

Route::get('/practice', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Practice';

});

Route::get('/confirm-login-worked', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database my_week');
        DB::statement('CREATE database my_week');

        return 'Dropped my_week; created my_week.';
    });

};
