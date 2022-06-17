<?php

namespace Models\Profile;

class TracksManager {
        
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
     * permet d'insérer une piste en BDD.
     * @param  int $song_id
     * @param string $name, $path
     * @return void
     */
    public function insert(int $song_id, string $name, string $path) {
        $query = $this->pdo->prepare("INSERT INTO tracks (song_id, name, path)
                                    VALUES (:song_id, :name, :path)");
        $query->bindValue(':song_id', $song_id);
        $query->bindValue(':name', $name);
        $query->bindValue(':path', $path);
        $query->execute();
    }
    
    /**
     * selectById
     * permet de sélectionner une piste grâce à son id.
     * @param  mixed $id
     * @return object
     */
    public function selectById(int $id){
        $query = $this->pdo->prepare("SELECT * FROM tracks WHERE id = :id ORDER BY name");
        $query->bindValue(':id', $id);
        $query->execute();
        return $results = $query->fetchAll(\PDO::FETCH_OBJ);
    }
    
    /**
     * selectBySongId
     * permet de sélectionner une piste grâce à l'id de la chanson.
     * @param  int $song_id
     * @return object
     */
    public function selectBySongId(int $song_id){
        $query = $this->pdo->prepare("SELECT * FROM tracks WHERE song_id = :song_id ORDER BY name");
        $query->bindValue(':song_id', $song_id);
        $query->execute();
        $results = $query->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }

}

?>