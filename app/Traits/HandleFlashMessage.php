<?php

namespace App\Traits;

trait HandleFlashMessage
{

    /**
     * Ouput flash message
     * @param string $message
     * @param string $type
     * @return void
     */
    protected function flashMessage(string $type = '', string $message = ''): void
    {
        session()->flash('type', $type);
        session()->flash('message', $message);
    }
}
