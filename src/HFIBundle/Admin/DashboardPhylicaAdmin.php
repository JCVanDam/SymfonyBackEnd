<?php

namespace HFIBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class DashboardPhylicaAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'dashboard/phylica';
    protected $baseRouteName = 'dashboard/phylica';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list']);
    }
}
