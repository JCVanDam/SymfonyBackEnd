<?php

namespace HFIBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class DashboardEradicationAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'dashboard/eradication';
    protected $baseRouteName = 'dashboard/eradication';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list']);
    }
}
