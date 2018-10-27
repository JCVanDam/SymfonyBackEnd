<?php

namespace PortalBundle\Service;

use Symfony\Component\Validator\Constraints\DateTime;

class UsefullFunction
{

  /**
   *
   */
   public function convertYear($datePlantation)
   {
     $date = new \DateTime($datePlantation);
     $now = new \DateTime();
     $interval = $now->diff($date);
     return(round($interval->y + ($interval->m / 12), 1));
   }

   /**
    *
    */
    public function getDiff($first_date, $second_date)
    {
      $interval = [
        "month" => round($second_date->diff($first_date)->m + $second_date->diff($first_date)->d / 30, 1),
        "days" => $second_date->diff($first_date)->days
      ];

      return($interval);
    }
}
