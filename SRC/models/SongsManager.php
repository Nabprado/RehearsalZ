<?php

namespace Models\Profile;

class SongsManager {
        
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
     * permet d'insérer une chanson en BDD.
     * @param  mixed $band
     * @return void
     */
    public function insert(int $band_id, string $name) {
        $query = $this->pdo->prepare("INSERT INTO songs (band_id, name)
                                    VALUES (:band_id, :name)");
        $query->bindValue(':band_id', $band_id);
        $query->bindValue(':name', $name);
        $query->execute();
    }

    /**
     * select
     * permet de sélectionner toutes les chansons stockées en BDD
     * @return object
     */
    public function select(){
        $query = $this->pdo->prepare("SELECT * FROM songs");
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }

    /**
     * select
     * permet de sélectionner une chanson stockée en BDD grâce à son nom et l'id du groupe
     * @return object
     */
    public function selectByName($name, $band_id){
        $query = $this->pdo->prepare("SELECT * FROM songs WHERE name = :name AND band_id = :band_id");
        $query->bindValue(':name', $name);
        $query->bindValue(':band_id', $band_id);
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
        
    /**
     * selectById
     * permet de sélectionner une chanson stockée en BDD grâce à son id
     * @param  mixed $id
     * @return object
     */
    public function selectById(int $id){
        $query = $this->pdo->prepare("SELECT * FROM songs WHERE id = :id ORDER BY name");
        $query->bindValue(':id', $id);
        $query->execute();
        return $results = $query->fetchAll(\PDO::FETCH_OBJ);
    }
        
    /**
     * selectByBandId
     * permet de sélectionner une ou des chanson(s) stockée(s) en BDD grâce à l'id du groupe
     * @param  mixed $band_id
     * @return object
     */
    public function selectByBandId(int $band_id){
        $query = $this->pdo->prepare("SELECT * FROM songs WHERE band_id = :band_id ORDER BY name");
        $query->bindValue(':band_id', $band_id);
        $query->execute();
        return $results = $query->fetchAll(\PDO::FETCH_OBJ);
    }

    

}

?>