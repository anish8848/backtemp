<?php

namespace App\Http\ViewCreators;

use Illuminate\View\View;

class BackendMenuCreator
{

    /**
     * The user model.
     *
     * @var \App\User;
     */
    protected $user;

    /**
     * Create a new menu bar composer.
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function create(View $view)
    {
        $menu[] = [
            'class' => false,
            'route' => url('/home'),
            'icon'  => 'md md-home',
            'title' => 'Home'
        ];

        $menu[] = [
            'class' => false,
            'route' => route('page.create'),
            'icon'  => 'md md-home',
            'title' => 'Page'
        ];



        $view->with('allMenu', $menu);
    }
}
