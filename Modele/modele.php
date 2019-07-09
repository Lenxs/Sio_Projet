<?php
class Modele
{
	private $unPDO;

	public function __construct($serveur,$bdd,$user,$mdp){
		$this->unPdo = null;

		try
		{
			//connexiona la bdd avec class pdo
			$this->unPdo= new PDO("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);
		}
		catch(PDOException $exp)
		{
			echo"Erreur de connexion a la base de données";

			echo $exp->getMessage();
		}
		
	}

	public function verifconnexionE($login,$pass){
		if($this->unPdo !=null){
			$requete="select * from etudiant where login = :login and pass= :pass ;";
			$donnees=array(":login"=>$login,":pass"=>$pass);
			$select= $this->unPdo->prepare($requete);
			$select->execute($donnees);
			$resultat=$select->fetch();
			return $resultat;
		}
	}

    public function verifconnexionP($login,$pass){
        if($this->unPdo !=null){
            $requete="select * from staff where login = :login and pass= :pass ;";
            $donnees=array(":login"=>$login,":pass"=>$pass);
            $select= $this->unPdo->prepare($requete);
            $select->execute($donnees);
            $resultat=$select->fetch();
            return $resultat;
        }
    }

/*-----------------function pour staff admin----------------------------*/
   /*-----les select-------------*/
	public function selectAllClasse(){

		if($this->unPdo!=null)
		{
			$requete="select * from classe ;";
			//preparation de la requete avant execution
			$select= $this->unPdo->prepare($requete);
			//execution de la requete
			$select->execute();
			//extraction des données
			$resultats = $select->fetchAll();
			return $resultats;
		}
	}

	public function selectAllProf(){

		if($this->unPdo!=null)
		{
			$requete="select * from staff where droits ='professeur';";
			//preparation de la requete avant execution
			$select= $this->unPdo->prepare($requete);
			//execution de la requete
			$select->execute();
			//extraction des données
			$resultats = $select->fetchAll();
			return $resultats;
		}
	}

	public function selectAllEtudiant(){

		if($this->unPdo!=null)
		{
			$requete="select * from etudiant;";
			//preparation de la requete avant execution
			$select= $this->unPdo->prepare($requete);
			//execution de la requete
			$select->execute();
			//extraction des données
			$resultats = $select->fetchAll();
			return $resultats;
		}
	}


/*----------------les insert delete--------------------------*/

    public function insertEtudiant($tab){
    if($this->unPdo!=null){
        $requete="insert into etudiant values(null,:login,:pass,:nom,:prenom,:adresse,:moyenne,:statut,:heure_arrive,:nb_retard,:total_retard,:id_classe)";
                $donnees=array(":login"=>$tab['login'],
							":pass"=>$tab['pass'],
							":nom"=>$tab['nom'],
							":prenom"=>$tab['prenom'],
							":adresse"=>$tab['adresse'],
							":moyenne"=>$tab['moyenne'],
							":statut"=>$tab['statut'],
							":heure_arrive"=>$tab['heure_arrive'],
							":nb_retard"=>$tab['nb_retard'],
							":total_retard"=>$tab['total_retard'],
							":id_classe"=>$tab['id_classe']);
                    $insert=$this->unPdo->prepare($requete);
                    $insert->execute($donnees);
    	}
	}

	public function insertStaff($tab)
	{
		if($this->unPdo!=null)
		{
			$requete="insert into staff values (null,:login,:pass,:nom,:prenom,:adresse,:droits)";
			$donnees=array(":login"=>$tab['login'],
							":pass"=>$tab['pass'],
							":nom"=>$tab['nom'],
							":prenom"=>$tab['prenom'],
							":adresse"=>$tab['adresse'],
							":droits"=>$tab['droits']);
			$insert = $this->unPdo->prepare($requete);
			$insert->execute($donnees);
		}
	}

	
    public function deleteEtudiant($id_etudiant){
        if($this->unPdo!= null){
            $requete="delete from etudiant where id_etudiant = :id_etudiant;";
            $donnees=array(":id_etudiant"=>$id_etudiant);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }

    public function deleteStaff($id_staff){
        if($this->unPdo!= null){
            $requete="delete from staff where id_staff = :id_staff;";
            $donnees=array(":id_staff"=>$id_staff);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }

    public function EditionRetard($tab){
    	$requete="insert into retard values(null,:dateretard,:heure_debut:,:heure_fin,:jour,:id_incident);";
    	$donnees=array(":dateretard"=>$tab['dateretard'],
    	":heure_debut"=>$tab['heure_debut'],
    	":heure_fin"=>$tab['heure_fin'],
    	":jour"=>$tab['jour'],
    	":id_incident"=>$tab['id_incident']);
    	$insert=$this->unPdo->prepare($requete);
    	$insert->execute($donnees);
    }

    public function deleteRetard($id_retard){
    	 if($this->unPdo!= null){
            $requete="delete from retard where id_retard = :id_retard;";
            $donnees=array(":id_retard"=>$id_retard);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }

    public function insertMatiere($tab){
    	$requete="insert into matiere values(null,:libelle);";
    	$donnees=array(":libelle"=>$tab['libelle']);
    	$insert = $this->unPdo->prepare($requete);
    	$insert->execute($donnees);
    }

    public function deleteMatiere($id_matiere){
    	 if($this->unPdo!= null){
            $requete="delete from matiere where id_matiere = :id_matiere;";
            $donnees=array(":id_matiere"=>$id_matiere);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }

    public function insertClasse($tab){
    	$requete="insert into classe values(null,:nom,:salle,:code)";
    	$donnees=array("nom"=>$tab['nom'],
    				"salle"=>$tab['salle'],
    				"code"=>$tab['code']);
    	$insert =  $this->unPdo->prepare($requete);
    	$insert->execute($donnees);
    }

    public function deleteClasse($id_classe){
    	 if($this->unPdo!= null){
            $requete="delete from classe where id_classe = :id_classe;";
            $donnees=array(":id_classe"=>$id_classe);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }

    public function insertDiplome($tab){
    	$requete="insert into diplome values(null,:nom);";
    	$donnees=array(":nom"=>$tab['nom']);
    	$insert = $this->unPdo->prepare($requete);
    	$insert->execute($donnees);
    }

    public function deleteDiplome($code){
    	 if($this->unPdo!= null){
            $requete="delete from diplome where id_code = :id_code;";
            $donnees=array(":id_code"=>$id_code);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }

    public function insertEmploiTemps($tab){
    	$requete="insert into emploi_temps values(null,:libelle,:id_classe);";
    	$donnees=array(":libelle"=>$tab['libelle'],
    				"id_classe"=>$tab['id_classe']);
    	$insert = $this->unPdo->prepare($requete);
    	$insert->execute($donnees);
    }

    public function deleteEmploiTemps($id_emploi){
    	 if($this->unPdo!= null){
            $requete="delete from emploi_temps where id_emploi = :id_emploi;";
            $donnees=array(":id_emploi"=>$id_emploi);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }
    public function insertEntreprise($tab){
    	$requete="insert into entreprise values(null,:nom);";
    	$donnees=array(":nom"=>$tab['nom']);
    	$insert = $this->unPdo->prepare($requete);
    	$insert->execute($donnees);
    }

    public function deleteEntreprise($id_entreprise){
    	 if($this->unPdo!= null){
            $requete="delete from entreprise where id_entreprise = :id_entreprise;";
            $donnees=array(":id_entreprise"=>$id_entreprise);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }
    public function insertMoyenT($tab){
    	$requete="insert into moyenT values(null,:libelle,:id_entreprise);";
    	$donnees=array(":libelle"=>$tab['libelle'],
    				"id_entreprise"=>$tab['id_entreprise']);
    	$insert = $this->unPdo->prepare($requete);
    	$insert->execute($donnees);
    }

    public function deleteMoyenT($id_moyen){
    	 if($this->unPdo!= null){
            $requete="delete from moyenT where id_moyen = :id_moyen;";
            $donnees=array(":id_moyen"=>$id_moyen);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }

    public function insertIncident($tab){
    	$requete="insert into incident values(null,:designation,:id_moyen)";
    	$donnees=array(":designation"=>$tab['designation'],
    				"id_moyen"=>$tab['id_moyen']);
    	$insert = $this->unPdo->prepare($requete);
    	$insert->execute($donnees);
    }

    public function deleteRetard($id_incident){
    	 if($this->unPdo!= null){
            $requete="delete from incident where id_incident = :id_incident;";
            $donnees=array(":id_incident"=>$id_incident);
            $delete=$this->unPdo->prepare($requete);
            $delete->execute($donnees);

        }
    }

    public function afficherMoyenne($tab){
    	$requete="select e.nom,e.prenom, AVG(n.note) as moyenne from etudiant e ,noter n where n.id_etudiant=e.id_etudiant and  e.id_etudiant =:id_etudiant;";
    	$donnees=array(":id_etudiant"=>$tab['id_etudiant']);
    	$insert = $this->unPdo->prepare($requete);
    	$insert->execute($donnees);
    }
}
?>