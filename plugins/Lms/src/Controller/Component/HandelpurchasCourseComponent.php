<?php
declare(strict_types=1);

namespace Lms\Controller\Component;

use Cake\Controller\Component;

/**
 * Handelpurchascourse component
 */
class HandelpurchasCourseComponent extends Component
{
    public $components = [];


    public function isvalidsellcode($code){

             $csvFile = WWW_ROOT . DS .'files'.DS.'demo.csv';
           

            // Initialisation de la variable pour le message de validation
            $validationMessage = '';
            
         
            
                // Lecture du fichier CSV
                $csvData = array_map('str_getcsv', file($csvFile));
            
                // Parcourir les lignes du fichier CSV
                foreach($csvData as $key => $row) {
                    // Vérifier si le code d'achat correspond et si sa valeur de validité est 0
                    if($row[2] == $code && $row[5] == 0) {
                        // Modifier la valeur de validité à 1 dans les données en mémoire
                        $csvData[$key][5] = 1;
            
                        // Écrire les modifications dans le fichier CSV
                        $file = fopen($csvFile, 'w');
                        foreach ($csvData as $line) {
                            fputcsv($file, $line);
                        }
                        fclose($file);
            
                        // Mettre à jour le message de validation
                        $validationMessage = "Code valide.";
            
                        // Sortir de la boucle si le code est trouvé
                        break;
                    } elseif ($row[2] == $code && $row[5] == 1) {
                        // Affichage du message si le code est expiré
                        $validationMessage = "Code expiré.";
                        // Sortir de la boucle si le code est trouvé
                        break;
                    }
                }
            
                // Affichage du message si le code n'existe pas
                if(empty($validationMessage)) {
                    $validationMessage = "Code invalide.";
                }
                return $validationMessage;
        }

}