<?php

namespace App\Observers;

use App\Models\Categrie;

class CategorieObserve
{
    /**
     * Handle the Categrie "created" event.
     *
     * @param  \App\Models\Categrie  $categrie
     * @return void
     */
    public function created(Categrie $categrie)
    {
        //
    }

    /**
     * Handle the Categrie "updated" event.
     *
     * @param  \App\Models\Categrie  $categrie
     * @return void
     */
    public function updated(Categrie $categrie)
    {
        //
        $categrie->vendores()->update(['active'=>$categrie->active]);
    }

    /**
     * Handle the Categrie "deleted" event.
     *
     * @param  \App\Models\Categrie  $categrie
     * @return void
     */
    public function deleted(Categrie $categrie)
    {
        //
    }

    /**
     * Handle the Categrie "restored" event.
     *
     * @param  \App\Models\Categrie  $categrie
     * @return void
     */
    public function restored(Categrie $categrie)
    {
        //
    }

    /**
     * Handle the Categrie "force deleted" event.
     *
     * @param  \App\Models\Categrie  $categrie
     * @return void
     */
    public function forceDeleted(Categrie $categrie)
    {
        //
    }
}
