<?php

namespace Models\Profile;

class BandsManager {
        
    /**
     * pdo
     * prend en paramètre la connexion à la BDD
     * @var mixed
     */
    private $pdo;

        /**
     * __construct
     *
     * @param  mixed $pdo
     * @return void
     */
    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }

    /**
     * insert
     * permet d'insérer une band en BDD.
     * @param  mixed $name, $picture, $userId
     * @return void
     */
    public function insert($name, $picture, $userId) {
        $query = $this->pdo->prepare("INSERT INTO bands (name, picture, userId) VALUES (:name, :picture, :userId)");
        $query->bindValue(':name', $name);
        $query->bindValue(':picture', $picture);
        $query->bindValue(':userId', $userId);
        $query->execute();
    }

        /**
     * selectAll
     * permet de sélectionner toutes les groupes stockés en BDD.
     * @return object
     */
    public function selectAll(){
        $query = $this->pdo->prepare("SELECT * FROM bands");
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }

            /**
     * select
     * permet de sélectionner toutes les groupes stockés en BDD.
     * @return object
     */
    public function select($band_id){
        $query = $this->pdo->prepare("SELECT * FROM bands WHERE id = :band_id");
        $query->bindValue(':band_id', $band_id);
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    
    /**
     * selectUserBands
     * permet de sélectionner les groupes selon l'id de l'utilisateur
     * @param  mixed $user_id
     * @return object
     */
    public function selectUserBands($user_id){
        $query = $this->pdo->prepare("SELECT * FROM bands WHERE userId = :userId");
        $query->bindValue(':userId', $user_id);
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_CLASS);
        return $results;
    }

    /**
     * updateBand
     * permet de modifier un groupe stocké en BDD.
     * @param  int $id
     * @param  string $nickname
     * @param  string $email
     * @return void
     */
    public function updateBand(int $id, string $name){
        $query = $this->pdo->prepare("UPDATE bands SET name = :name WHERE id = :id");
        $query->bindValue(':name', $name);
        $query->bindValue(':id', $id);
        $query->execute();
    }

    /**
     * deleteBand
     * permet de supprimer un groupe (et ses chansons) stocké en BDD.
     * @param  int $id
     * @param  string $nickname
     * @param  string $email
     * @return void
     */
    public function deleteBand(int $id){
        $query = $this->pdo->prepare("DELETE FROM songs WHERE band_id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        $query = $this->pdo->prepare("DELETE FROM bands WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
    }


}

?>