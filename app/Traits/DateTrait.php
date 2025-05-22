<?php
namespace App\Traits;

trait DateTrait {
    private $unites = [
        'years'  => 31536000, // 365 jours
        'mounths'   => 2592000,  // 30 jours
        'days'   => 86400,    
        'hours'  => 3600,     
        'minutes' => 60,       
        'seconds'=> 1         
    ];

    protected function getDateOfSeconds(int $seconde): string {
        $time = $seconde;
        $result = '';

        if($time > $this->unites['years']) {
            $result .= intdiv($time, $this->unites['years']) . ' yers ';
            $time = $time % $this->unites['years'];

        }

        if($time > $this->unites['mounths']) {
            $result .= intdiv($time, $this->unites['mounths']) . ' mounths ';
            $time = $time % $this->unites['mounths'];
        }

        if($time > $this->unites['days']) {
            $result .= intdiv($time, $this->unites['days']) . ' days ';
            $time = $time % $this->unites['days'];

            return $result;
        }

        if($time > $this->unites['hours']) {
            $result .= intdiv($time, $this->unites['hours']) . ' hours ';
            $time = $time % $this->unites['hours'];

            return $result;
        }

        if($time > $this->unites['minutes']) {
            $result .= intdiv($time, $this->unites['minutes']) . ' minutes ';
            $time = $time % $this->unites['minutes'];

            return $result;
        }

        return ($time > 0) ? $result . ' secondes' : $time;
    }
}