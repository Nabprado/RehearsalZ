<?php

namespace Models\Profile;

/**
 * Bands
 * permet de crééer un objet Tracks.
 */
class Tracks {
        
    /**
     * id, song_id
     * permet de sotcker l'id de la piste et l'id de la chanson à laquelle la piste appartient.
     * @var int
     */
    /**
     * name, path
     * permettent de stocker le nom et le chemin vers la piste.
     * 
     * created_at
     * @var timestamp
     * 
     * @var string
     */
    private $id,
            $name,
            $path,
            $song_id;

    /**
     * constantes - permettent de paramétrer les erreurs
     */
    const NAME_INVALID = 1;
    const PATH_INVALID = 2;

    /**
     * __construct
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data = []) {
        if(!empty($data)){
            $this->hydrate($data);
        }
    }

    /**
     * hydrate
     * permet d'hydrater le construct
     *
     * @param  mixed $data
     * @return void
     */
    public function hydrate($data): void {
        foreach($data as $key=>$value){
            $setter = "set".ucfirst($key);
            $this->$setter($value);
        }
    }

// GETTERS*************************************
    
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getPath(){
        return $this->path;
    }
    public function getSongId(){
        return $this->song_id;
    }

// SETTERS***************************************

    public function setId(int $id){
        if(!empty($id)){
            $this->id = (int) $id;
        }
    }
    public function setName(string $name){
        if(empty($name) || strlen($name) > 150){
            return $this->errors[] = self::NAME_INVALID;
        }else {
            $this->name = $name;
        }
    }
    public function setPath(string $path){
        if(empty($path)){
            return $this->errors[] = self::PATH_INVALID;
        }else {
            $this->path = $path;
        }
    }
    public function setSongId(int $song_id){
        if(!empty($song_id)){
            $this->song_id = (int) $song_id;
        }
    }


}

?>