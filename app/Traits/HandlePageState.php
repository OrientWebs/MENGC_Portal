<?php

namespace App\Traits;

trait HandlePageState
{

    /**
     * Author   : Ye Htun
     * Date     : 8/7/2025
     * handle current page state
     * This function is determine Current Function
     * customize function name
     * Summary of determineCurrentPage
     * This function determines the current page state based on the provided route map.
     * It sets the current page to the appropriate action based on the request route.
     * If no matching route is found, it defaults to the specified default page or 'list
     * @param array $routeMap
     * @return void
     */
    protected function determineCurrentPage(array $routeMap): void
    {
        foreach ($routeMap as $route => $action) {
            if (request()->is($route)) {
                $this->handlePageAction($action, request()->route('id'));
                return;
            }
        }
        $this->currentPage = $this->defaultPage ?? 'list';
    }

    /*
     * Author   : Ye Htun
     * Date     : 8/7/2025
     * handle page action based on current page state
     * @param string $action
     * @param mixed $id
     * @return void
     */
    protected function handlePageAction(string $action, $id = null): void
    {
        $this->currentPage = $action;

        if (method_exists($this, $action)) {
            $id ? $this->{$action}($id) : $this->{$action}();
        }
    }
}
