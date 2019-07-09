<?php
	//appel de la methode 
	require_once("Modele/modele.php");
	class Controleur{

		private $unModele;

		public function __construct($serveur,$bdd,$user,$mdp)
		{
			//instanciation de la class modele
			$this->unModele = new Modele($serveur,$bdd,$user,$mdp);
		}
		

	public function verifConnexionE($login,$pass){
		return $this->unModele->verifConnexionE($login,$pass);
	}
	public function verifConnexionP($login,$pass){
        return $this->unModele->verifConnexionP($login, $pass);
    }
    /*--------------select----------------*/
    public function selectAllClasse()
	{
		$resultats = $this->unModele->selectAllClasse();
		//on peut realiser des traitements avant l'affichage
		return $resultats;
	}
    public function selectAllProf(){
    	$resultats = $this->unModele->selectAllProf();
    	return $resultats;
    }
    public function selectAllEtudiant(){
    	$resultats = $this->unModele->selectAllEtudiant();
    	return $resultats;
    }
    /*--------------insert----------------*/

    public function insertEtudiant($tab){
    	$this->unModele->insertEtudiant($tab);
    }

    public function insertStaff($tab){
    	$this->unModele->insertStaff($tab);
    }

    public function EditionRetard($tab){
    	$this->unModele->EditionRetard($tab);
    }

    public function insertMatiere($tab){
    $this->unModele->insertMatiere($tab);
    }

    public function insertClasse($tab){
        $this->unModele->insertClasse($tab);
    }

    public function insertDiplome($tab){
        $this->unModele->insertDiplome($tab);
    }

    public function insertEmploiTemps($tab){
        $this->unModele->insertEmploiTemps($tab);
    }

    public function insertEntreprise($tab){
        $this->unModele->insertEntreprise($tab);
    }

    public function insertMoyenT($tab){
        $this->unModele->insertMoyenT($tab);
    }

    public function insertIncident($tab){
    $this->unModele->insertIncident($tab);
    }

    /*-------------les deletes-----------------------*/

    public function deleteStaff($id_staff){
    	$this->unModele->deleteStaff($id_staff);
    }

    public function deleteEtudiant($id_etudiant){
    	$this->unModele->deleteEtudiant($id_etudiant);
    }
    public function deleteRetard($id_retard){
    	$this->unModele->deleteRetard($id_retard);
    }

    public function deleteMatiere($id_matiere){
        $this->unModele->deleteMatiere($id_matiere);
    }

    public function deleteClasse($id_classe){
        $this->unModele->deleteClasse($id_classe);
    }

    public function deleteDiplome($code){
        $this->unModele->deleteDiplome($code);
    }

    public function deleteEmploiTemps($id_emploi){
        $this->unModele->deleteEmploiTemps($id_emploi);
    }

    public function deleteEntreprise($id_entreprise){
        $this->unModele->deleteEntreprise($id_entreprise);
    }

    public function deleteMoyenT($id_moyen){
        $this->unModele->deleteMoyenT($id_moyen);
    }

    public function deleteIncident($id_incident){
        $this->unModele->deleteIncident($id_incident);
    }
}
?>