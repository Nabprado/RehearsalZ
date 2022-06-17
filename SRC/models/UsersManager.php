<?php

namespace Models\Authentification;

/**
 * Class UsersManager
 * permet de gérer les utilisateur et faire le lien avec la BDD.
 */
class UsersManager {
    
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
     * permet d'insérer un utilisateur en BDD.
     * @param  mixed $user
     * @return void
     */
    public function insert(Users $user){
        $query = $this->pdo->prepare("INSERT INTO users (nickname, email, password)
                                    VALUES (:nickname, :email, :password)");
        $query->bindValue(':nickname', $user->getNickname());
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':password', $user->getPassword());
        $query->execute();
    }
    
    /**
     * selectAll
     * permet de sélectionner tous les utilisateurs stockés en BDD.
     * @return void
     */
    public function selectAll(){
        $query = $this->pdo->prepare("SELECT * FROM users");
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Users');
        $results = $query->fetchAll();
        $query->closeCursor();
        return $results;
    }
    
    /**
     * selectUser
     * permet de sélectionner un utilisateur stocké en BDD grâce à son ID.
     * @param  int $id
     * @return void
     */
    public function selectUser(int $id){
        $query = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        $results = $query->fetch(\PDO::FETCH_OBJ);
        return $results;
    }
    
    /**
     * selectUserByEmail
     * permet de sélectionner un utilisateur stocké en BDD grâce à son email.
     * @param  string $email
     * 
     */
    public function selectUserByEmail(string $email){
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindValue(':email', $email);
        $query->execute();
        $results = $query->fetch(\PDO::FETCH_OBJ);
        return $results;
    }
    
    /**
     * updateUser
     * permet de modifier un utilisateur stocké en BDD.
     * @param  int $id
     * @param  string $nickname
     * @param  string $email
     * @return void
     */
    public function updateUser(int $id, string $nickname, string $email){
        $query = $this->pdo->prepare("UPDATE users SET nickname = :nickname, email = :email WHERE id = :id");
        $query->bindValue(':nickname', $nickname);
        $query->bindValue(':email', $email);
        $query->bindValue(':id', $id);
        $query->execute();
    }

    /**
     * updatePassword
     * permet de modifier le mot de passe d'un utilisateur stocké en BDD.
     * @param  int $id
     * @param  string $nickname
     * @param  string $email
     * @return void
     */
    public function updatePassword(int $id, string $password){
        $query = $this->pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
        $query->bindValue(':password', $password);
        $query->bindValue(':id', $id);
        $query->execute();
    }
    
    /**
     * deleteUser
     * permet de supprimer un utilisateur de la BDD grâce à son ID.
     * @param  int $id
     * @return void
     */
    public function deleteUser(int $id){
        $query = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
    }

    
}

?>