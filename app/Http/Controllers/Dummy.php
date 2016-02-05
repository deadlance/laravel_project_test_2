<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Http\Controllers\Controller;

use \App\MainMenu;

class Dummy extends Controller
{

  public function index()
  {

    // This is a temporary fix for how we'll build our main menu. At some point I'd like to make this a gui.

    $menu = [
      // Account
      ['id' => 1, 'name' => 'Register', 'slug' => 'register', 'url' => '/register', 'description' => 'Website Registration', 'icon' => '', 'cssClass' => '', 'cssId' => '', 'onClick' => '', 'userGroup' => 'guest'],
      ['id' => 2, 'name' => 'Login', 'slug' => 'login', 'url' => '/login', 'description' => 'Login to Your Account', 'icon' => '', 'cssClass' => '', 'cssId' => '', 'onClick' => '', 'userGroup' => 'guest'],
      ['id' => 3, 'name' => 'Account', 'slug' => 'account', 'url' => '/profile', 'description' => 'View Your Profile', 'icon' => '', 'cssClass' => '', 'cssId' => '', 'onClick' => '', 'userGroup' => 'users', 'children' => [
        ['id' => 4, 'name' => 'Logout', 'slug' => 'logout', 'url' => '/logout', 'description' => 'Website Logout', 'icon' => '', 'cssClass' => '', 'cssId' => '', 'onClick' => '', 'userGroup' => 'users'],
        ['id' => 5, 'name' => 'Users', 'slug' => 'users', 'url' => '/users', 'description' => 'Admin: Users', 'icon' => '', 'cssClass' => '', 'cssId' => '', 'onClick' => '', 'userGroup' => 'admin'],
        ['id' => 6, 'name' => 'Groups', 'slug' => 'groups', 'url' => '/groups', 'description' => 'Admin: Groups', 'icon' => '', 'cssClass' => '', 'cssId' => '', 'onClick' => '', 'userGroup' => 'admin', 'children' => [
          ['id' => 7, 'name' => 'test', 'slug' => 'test', 'url' => '/test', 'description' => 'test', 'icon' => '', 'cssClass' => '', 'cssId' => '', 'onClick' => '', 'userGroup' => 'users'],
        ]]
      ]]

      // About Us / Home


    ];

    MainMenu::buildTree($menu);

    //return "<pre>" . json_encode(MainMenu::all()->toHierarchy(), JSON_PRETTY_PRINT) . "</pre>";
    return MainMenu::all()->toHierarchy();

  }

}