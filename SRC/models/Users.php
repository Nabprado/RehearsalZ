<?php

namespace Models\Authentification;

/**
 * Class Users
 * Permet de créer un objet utilisateur.
 */ 
class Users {
    
    /**
     * errors
     * permet de stocker les éventuelles erreurs.
     *
     * @var array
     */
    private array $errors = array();

    /**
     * id
     * permet de stocker l'id de l'utilisateur.
     *
     * @var int
     */
    private int $id;

    /**
     * nickname, email, password
     * permettent de stocker les informations de l'utilisateur.
     *
     * @var string
     */
    private string $nickname;
    private string $email;
    private string $password;

    /**
     * band_id
     * permettent de stocker l'id des bands de l'utilisateur.
     *
     * @var int
     */
    private int $band1_id;
    private int $band2_id;

    /**
     * success - permet de stocker 
     *
     * @var bool
     */
    public bool $success;


    /**
     * constantes - permettent de paramétrer les erreurs
     */
    const NICKNAME_INVALID = 1;
    const PASSWORD_INVALID = 2;
    const EMAIL_INVALID = 3;
    
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
    
    /**
     * isUserValid
     * permet de vérifier si les informations de l'utilisateur ne sont pas vides
     *
     * @return void
     */
    public function isUserValid(){
        if(!empty($this->nickname) && !empty($this->email) && !empty($this->password)){
            return true;          
        } else {
                return $this->errors;    
        }
    }

        
// GETTERS*************************************
    
    public function getErrors(){
        return $this->errors;
    }

    public function getId(){
        return $this->id;
    }

    public function getNickname(){
        return $this->nickname;
    }
    
    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getAdmin(){
        return $this->admin;
    }
    public function getBand1Id(){
        return $this->band1_id;
    }
    public function getBand2Id(){
        return $this->band2_id;
    }

// SETTERS***************************************

    public function setId(int $id){
        if(!empty($id)){
            $this->id = (int) $id;
        }
    }

    public function setNickname(string $nickname){
        if(empty($nickname) || strlen($nickname) > 50 || strlen($nickname) < 3){
            return $this->errors[] = self::NICKNAME_INVALID;
        }else {
            $this->nickname = $nickname;
        }
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail(string $email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        } else {
            return $this->errors[] = self::EMAIL_INVALID;
        }
    }
    public function setBand1Id(int $band1_id){
        if(!empty($band1_id)){
            $this->band1_id = (int) $band1_id;
        }
    }
    public function setBand2Id(int $band2_id){
        if(!empty($band2_id)){
            $this->band2_id = (int) $band2_id;
        }
    }

}

?>