<?php

namespace App\Security;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class EmpleadoVoter extends Voter
{
    const CREAR_EMPLEADO = 'CREAR_EMPLEADO';

    /**
     * @var AccessDecisionManagerInterface
     */
    private $accessDecisionManager;

    public function __construct(AccessDecisionManagerInterface $accessDecisionManager)
    {
        $this->accessDecisionManager = $accessDecisionManager;
    }


    /**
     * @inheritDoc
     */
    protected function supports($attribute, $subject)
    {
        if ($attribute === self::CREAR_EMPLEADO) {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        if ($this->accessDecisionManager->decide($token, ['ROLE_SUPERVISOR'])) {
            return true;
        }
        return false;
    }
}
