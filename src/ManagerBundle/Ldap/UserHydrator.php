<?php

namespace ManagerBundle\Ldap;

use FR3D\LdapBundle\Hydrator\HydratorInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserHydrator implements HydratorInterface
{
    /**
     * Populate an user with the data retrieved from LDAP.
     *
     * @param array $ldapEntry LDAP result information as a multi-dimensional array.
     *              see {@link http://www.php.net/function.ldap-get-entries.php} for array format examples.
     *
     * @return UserInterface
     */
    public function hydrate(array $ldapEntry)
    {
        die("HYDRATE");
        $user = new AppBundle\Entity\User();
        $user->setUsername($ldapEntry['uid'][0]);
        $user->setEmail($ldapEntry['email'][0]);

        return $user;
    }
}