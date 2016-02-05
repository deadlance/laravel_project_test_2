<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainMenuTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('main_menu', function(Blueprint $table) {
      // These columns are needed for Baum's Nested Set implementation to work.
      // Column names may be changed, but they *must* all exist and be modified
      // in the model.
      // Take a look at the model scaffold comments for details.
      // We add indexes on parent_id, lft, rgt columns by default.
      $table->increments('id');
      $table->integer('parent_id')->nullable()->index();
      $table->integer('lft')->nullable()->index();
      $table->integer('rgt')->nullable()->index();
      $table->integer('depth')->nullable();

      /*
       * These are the fields for our main menu.
       *
       * name - The long name... A more descriptive version of the menu nam
       * slug - A short, no spaces (use dashes instead of spaces) name.
       * url - This is where we go when we click the link.
       * description - A more verbose description. Also potentially used in tooltips.
       * icon - path to the icon image for the link.
       * cssClass - additional css classes to include with each menu item
       * cssId - css id to be used for specific menu item
       * onClick - javascript onclick event triggered function. Essentially used in onClick="$onClick()"
       * userGroup - The usergroup(s) that can see this menu.
       *
       */
      $table->string('name')->nullable();
      $table->string('slug')->nullable();
      $table->string('url')->nullable();
      $table->string('description')->nullable();
      $table->string('icon')->nullable();
      $table->string('cssClass')->nullable();
      $table->string('cssId')->nullable();
      $table->string('onClick')->nullable();
      $table->string('userGroup')->nullable();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('main_menu');
  }

}
