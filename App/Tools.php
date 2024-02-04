<?php

namespace App;

use Exceptions\PathNotCorrectlyWritten;

trait Tools
{
    // définition des constantes
    
    // définition des fonctions utilitaires
    
    /**
     * Method sanitizer
     * fonction de vérification des chaines de carctères, vérifie que la chaine ne contient que des lettres et 1 #lève une exception dans le cas contraire
     * @param string $path [string must be verify]
     *
     * @return array
     */
    public function sanitizer(string $path):array
    {
        if (preg_match('%^[a-zA-Z]+[#]{1}+[a-zA-Z]+$%',$path,$matches))
        {
            return explode('#', $matches[0]);
        }
        else{
            preg_match_all('%([^a-zA-Z0-9 ^#{1}])%',$path,$matches);
            throw new PathNotCorrectlyWritten('controller\'s name is written wrong! there are the specials characteres in your Path : ' . implode(',',$matches[0]) );
        }   

    }

}