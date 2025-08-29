<?php

namespace App\Livewire\Admin\Base;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\HandlePageState;
use Livewire\Attributes\Layout;
use App\Traits\AuthorizeRequests;
use App\Traits\HandleFlashMessage;

/**
 * Author : Ye Htun
 * Date   : 2025-8-14
 * Base component class for Livewire components in the admin panel.
 * This class should be extended by specific components.
 * It provides common functionality such as pagination, authorization checks, and layout management.
 * This class uses the `WithPagination` trait for pagination functionality,
 * the `AuthorizeRequests` trait for authorization checks,
 * and the `HandlePageState` trait for managing the current page state.
 * It also uses the `Layout` attribute to specify the layout for the component.
 */
abstract class BaseComponent extends Component
{
    use WithPagination, AuthorizeRequests, HandlePageState, HandleFlashMessage;
    #[Layout('admin.layouts.app')]
    public $currentPage = 'index';
    public $search = '';
    public $prePage;
    protected $createRoute, $editRoute, $showRoute;
}
