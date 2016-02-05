<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


use App\Http\Requests;

use View;

use App\Album;

class AlbumsController extends Controller
{
    public function getList() {
      $albums = Album::with('Photos')->with('User')->get();

      echo var_export(\Sentry::findUserById(\Sentry::getUser()->id));
      exit;

      return View::make('index')->with('albums', $albums);
    }

    public function getAlbum($id) {
      $album = Album::with('Photos')->find($id);
      return View::make('album')->with('album', $album);
    }

    public function getForm() {
      //echo var_export(\Sentry::getUser()->id);
      //exit;
      return View::make('createalbum');
    }

    public function postCreate() {
      $rules = array(
        'name' => 'required',
        'cover_image' => 'required|image'
      );

      $validator = Validator::make(Input::all(), $rules);
      if($validator->fails()) {
        return Redirect::route('create_album_form')->withErrors($validator)->withInput();
      } // end if

      $file = Input::file('cover_image');
      $random_name = str_random(8);
      $destinationPath = 'albums/';
      $extension = $file->getClientOriginalExtension();
      $filename=$random_name . "." . $extension;
      $uploadSuccess = Input::file('cover_image')->move($destinationPath, $filename);
      $album = Album::create(array(
        'name' => Input::get('name'),
        'description' => Input::get('description'),
        'cover_image' => $filename,
        'user_id' => \Sentry::getUser()->id
      ));

/*
      $filename = Input::file('cover_image');
      $random_name = str_random(8);
      $destinationPath = 'albums/';
      $extension = $filename->getClientOriginalExtension();
      $uploadSuccess = Input::file('cover_image')->move($destinationPath, $filename . "." . $extension);
      $album = Album::create(array(
        'name' => Input::get('name'),
        'description' => Input::get('description'),
        'cover_image' => $filename . "." . $extension,
      ));

      */


      return Redirect::route('show_album', array('id' => $album->id));
    }

    public function getDelete($id) {
      $album = Album::find($id);
      $album->delete();
      return Redirect::route('index');
    }
}
