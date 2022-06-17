<?php

namespace Models\Profile;

/**
 * Bands
 * permet de crééer un objet Band.
 */
class Bands {
        
    /**
     * id, userId
     * permet de sotcker l'id de la band et de l'utilisateur correspondant à la band.
     * @var int
     */
    /**
     * name, picture
     * permettent de stocker le nom et le chemin vers la photo du groupe.
     * 
     * @var string
     */
    private $id,
            $name,
            $picture,
            $userId;

    /**
     * constantes - permettent de paramétrer les erreurs
     */
    const NAME_INVALID = 1;
    const PICTURE_INVALID = 2;

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
    public function getPicture(){
        return $this->picture;
    }
    public function getUserId(){
        return $this->userId;
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
    public function setPicture(string $picture){
        if(empty($picture)){
            return $this->errors[] = self::PICTURE_INVALID;
        }else {
            $this->picture = $picture;
        }
    }
    public function setUserId(int $userId){
        if(!empty($userId)){
            $this->userId = (int) $userId;
        }
    }

}

?>