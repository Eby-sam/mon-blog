<?php

namespace App\Model\Manager;


use App\Model\Entity\Role;
use Connect;
use User;

class RoleManager
{
    public const TABLE = "role";

    /**
     * @param User $user
     * @return array
     */
    public static function getRoleByUser(User $user): array
    {
        $roles = [];
        $query = Connect::dbConnect()->query("
            SELECT * FROM role
                        WHERE id IN (SELECT role_fk FROM user WHERE id = {$user->getId()})");
        if($query){
            foreach($query->fetchAll() as $roleData) {
                $roles[] = (new Role())
                    ->setId($roleData['id'])
                    ->setRoleName($roleData['role_name'])
                ;
            }
        }
        return $roles;
    }

    /**
     * @param string $roleName
     * @return Role
     */
    public static function getRoleByName(string $roleName): Role
    {
        $role = new Role();
        $rQuery = Connect::dbConnect()->query("
            SELECT * FROM role WHERE role_name = '".$roleName."'
        ");
        if($rQuery && $roleData = $rQuery->fetch()) {
            $role->setId($roleData['id']);
            $role->setRoleName($roleData['role_name']);
        }
        return $role;
    }
}