<?php namespace StudioDevs\Wiki\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateTagsTable Migration
 *
 * @link https://docs.octobercms.com/4.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('studiodevs_wiki_tags', function(Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('color');
            $table->timestamps();
        });

        Schema::create('studiodevs_wiki_article_tag', function ($table) {
            $table->bigInteger('article_id')->unsigned()->index();
            $table->bigInteger('tag_id')->unsigned()->index();
            $table->primary(['article_id', 'tag_id']);
        });

    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('studiodevs_wiki_tags');
        Schema::dropIfExists('studiodevs_wiki_article_tag');
    }
};
