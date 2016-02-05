<?php








Route::group(['middleware' => ['web']], function () {

    /*
     * These are the web based routes that do not require authentication.
     */
    Route::get('home', array('as' => 'home', function () {
        //return var_dump(Sentry::check());
        return view('welcome');
    }));



    /*
     * This group just requires you to be logged in. Any group.
     */
    Route::group(['middleware' => ['sentry.auth']], function() {
        // The photo album stuff. Mainly just testing things.
        Route::get('/', array('as' => 'index', 'uses' => 'AlbumsController@getList'));
        Route::get('/createalbum', array('as' => 'create_album_form', 'uses' => 'AlbumsController@getForm'));
        Route::post('/createalbum', array('as' => 'create_album', 'uses' => 'AlbumsController@postCreate'));
        Route::get('/deletealbum/{id}', array('as' => 'delete_album', 'uses' => 'AlbumsController@getDelete'));
        Route::get('/album/{id}', array('as' => 'show_album', 'uses' => 'AlbumsController@getAlbum'));
        Route::get('/addimage/{id}', array('as' => 'add_image', 'uses' => 'ImageController@getForm'));
        Route::post('/addimage', array('as' => 'add_image_to_album', 'uses' => 'ImageController@postAdd'));
        Route::get('/deleteimage/{id}', array('as' => 'delete_image', 'uses' => 'ImageController@getDelete'));
        Route::post('/moveimage', array('as' => 'move_image', 'uses' => 'ImageController@postMove'));
    });


    /*
     * Routes available to defined user groups.
     */
    Route::group(['middleware' => ['sentry.member:Admins']], function () {
        // This rebuilds the main menu.
        Route::get('dummy', 'Dummy@index');
    });

    Route::group(['middlware' => ['sentry.member:CustomerService']], function() {

    });

    Route::group(['middlware' => ['sentry.member:Sales']], function() {

    });
});
