<?php

namespace Models\Profile;

/**
 * Bands
 * permet de crééer un objet Song.
 */
class Songs {
        
    /**
     * id, band_id
     * permet de sotcker l'id de la chanson et l'id de la band à laquelle la chanson appartient.
     * @var int
     */
    /**
     * name, path
     * permettent de stocker le nom et le chemin vers la chanson.
     * @var string
     * 
     * created_at
     * @var timestamp
     * 
     */
    private $id,
            $name,
            $path,
            $band_id,
            $created_at;

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
    public function getBandId(){
        return $this->band_id;
    }
    public function getCreatedAt(){
        return $this->created_at;
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
    public function setBandId(int $band_id){
        if(!empty($band_id)){
            $this->band_id = (int) $band_id;
        }
    }
    public function setCreatedAt($created_at){
        $this->created_at = $created_at;
    }

}

?>