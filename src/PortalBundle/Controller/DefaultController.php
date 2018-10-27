<?php

namespace PortalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{

    /**
     * @Route("/")
     */
    public function loginAction()
    {
      return $this->redirect("/admin");
    }

    /**
     * @Route("/admin/application")
     */
    public function indexAction()
    {
      return $this->render('PortalBundle:Default:index.html.twig');
    }

    /**
     * @Route("/admin/parameter")
     */
    public function parameterAction(Request $request)
    {
      $session = $request->getSession();
      $session->set('service', substr($request->getUri(), 50));
      if ($session && $session->get('service'))
      {
          switch ($session->get('service')) {
            case "phylica":
            $districts = array('Amsterdam');
            $session->set('district', $districts);
              break;
            case "frequentation":
              $districts = array('Amsterdam', 'Crozet', 'Kerguelen');
              $session->set('district', $districts);
              break;
            default:
              $session->set('district', "");
              break;
          }
      }
      return $this->redirect("/admin/dashboard?service=" . $session->get('service'));
    }

    /**
     * @Route("/admin/chart")
     */
    public function chartAction(Request $request)
    {
      $session = $request->getSession();
      if ($session && $session->get('service'))
      {
          switch ($session->get('service')) {
            case "phylica":
              $phylicaCtrl = $this->get('phylica.default_controller');
              $response = $phylicaCtrl->chartAction($this);
              break;
            case "frequentation":
              $frequentationCtrl = $this->get('phylica.default_controller');
              $response = $frequentationCtrl->chartAction($this);
              break;
            case "hfi":
              $hfiCtrl = $this->get('hfi.default_controller');
              $response = $hfiCtrl->chartAction($this);
              break;
            default:
              $response = null;
              break;
          }
          return $response;
      }
    }
}
