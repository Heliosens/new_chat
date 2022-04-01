<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/User.php';

class UserManager
{
    /**
     * @return array
     */
    public static function getUser(): array
    {
        $users = [];
        $query = DB::conn()->query("SELECT * FROM user");
        if($query){
            foreach ($query->fetchAll() as $data){
                $users[] = (new User)
                    ->setId($data['id'])
                    ->setPseudo($data['pseudo'])
                    ->setOn($data['onAir'])
                    ;
            }
        }
        return $users;
    }

    /**
     * @param $id
     * @return User
     */
    public static function getUserById($id): User
    {
        $user = "";
        $query = DB::conn()->query("SELECT * FROM user WHERE id = $id");
        if($query){
            $user = $query->fetch();
        }
        return (new User())
            ->setId($user['id'])
            ->setPseudo($user['pseudo'])
            ->setOn($user['onAir'])
            ;
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

}
