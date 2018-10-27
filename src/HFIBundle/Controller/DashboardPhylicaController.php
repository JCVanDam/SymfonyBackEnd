<?php

namespace HFIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardPhylicaController extends Controller
{
    public function listAction()
    {
      $totalPlante = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Observation', 'hfi')
        ->getTotalPlante();
      // dump($totalPlante);
      // die;

      $totalSuivi = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Phylica', 'hfi')
        ->getTotalSuivi();
      // dump($totalSuivi);
      // die;

      $totalSuiviNonMort = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Phylica', 'hfi')
        ->getTotalSuiviNonMort();
      // dump($totalSuiviNonMort);
      // die;

      $total = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Phylica', 'hfi')
        ->getTotalSuivi();
      // dump($total);
      // die;

      $average = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Phylica', 'hfi')
        ->getAveragePerYear();
      // dump($average);
      // die;

      $volumePerYear = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Phylica', 'hfi')
        ->getVolumePerYear();
      // dump($volumePerYear);
      // die;

      $volumePerDate = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Phylica', 'hfi')
        ->getVolumePerDate();

      $volumeAge = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Phylica', 'hfi')
        ->getVolumeAge();
      // dump($volumeAge);
      // die;

      $coordinate = $this
        ->getDoctrine()
        ->getManager('hfi')
        ->getRepository('HFIBundle:Phylica', 'hfi')
        ->getCoordinate();
      return $this->render(
        'HFIBundle:Default:phylicaDashboard.html.twig', [
          'total' => $total[0]['counter'],
          'average' => $average[0]['round'],
          'volumePerYear' => $volumePerYear,
          'volumePerDate' => json_encode($volumePerDate),
          'volumeAge' => json_encode($volumeAge),
          'coordinate' => json_encode($coordinate)
        ]
      );
    }
}
