<?php

namespace App\Observers\Painel;

use App\Models\Painel\Blog;
use Illuminate\Support\Str;

class BlogObserver
{
  /**
   * Handle the Blog "creating" event.
   *
   * @param  App\Models\Painel\Blog  $blog
   * @return void
   */
  public function creating(Blog $blog)
  {
    $blog->url_titulo = Str::kebab($blog->titulo);
  }

  /**
   * Handle the Blog "updating" event.
   *
   * @param  App\Models\Painel\Blog  $blog
   * @return void
   */
  public function updating(Blog $blog)
  {
    $blog->url_titulo = Str::kebab($blog->titulo);
  }
}
