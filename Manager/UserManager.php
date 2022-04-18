<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/User.php';

class UserManager
{
    /**
     * read db
     * @return array
     */
    public static function getAllUsers(): array
    {
        $users = [];
        $query = DB::conn()->query("SELECT * FROM user");
        if($query){
            foreach ($query->fetchAll() as $data){
                $users[] = (new User)
                    ->setId($data['id'])
                    ->setPseudo($data['pseudo'])
                    ;
            }
        }
        return $users;
    }

    /**
     * @param $id
     * @return User|null
     */
    public static function getUserById($id): ?User
    {
        $query = DB::conn()->query("SELECT * FROM user WHERE id = $id");
        if($query){
            $user = $query->fetch();
            return (new User())
                ->setId($user['id'])
                ->setPseudo($user['pseudo'])
                ;
        }
        return null;
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function addUser(User &$user):bool
    {
        $stm = DB::conn()->prepare("
            INSERT INTO user (pseudo) VALUES (:pseudo)
        ");
        $stm->bindValue(':pseudo', $user->getPseudo());
        $result = $stm->execute();
        $user->setId(DB::conn()->lastInsertId());
        return $result;
    }

    /**
     * @param $pseudo
     * @return bool
     */
    public static function userExist($pseudo):bool
    {
        $result = DB::conn()->prepare("
            SELECT * FROM user WHERE pseudo = :pseudo
        ");

        $result->bindValue(':pseudo', $pseudo);
        $result->execute();
        return $result->fetch() ? true : false;
    }

    /**
     * @param string $name
     * @return User|null
     */
    public static function getUserByPseudo (string $name) :?User
    {
        $stm = DB::conn()->prepare("SELECT * FROM user WHERE pseudo = :name");
        $stm->bindValue(':name', $name);
        $stm->execute();
        if($stm){
            $user = $stm->fetch();
            return (new User())
                ->setId($user['id'])
                ->setPseudo($name)
                ;
        }
        return null;
    }
}