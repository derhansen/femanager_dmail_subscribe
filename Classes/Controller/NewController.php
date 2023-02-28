<?php
namespace Derhansen\FemanagerDmailSubscribe\Controller;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Derhansen\FemanagerDmailSubscribe\Domain\Repository\DmailCategoryRepository;
use Derhansen\FemanagerDmailSubscribe\Xclass\Extbase\Mvc\Controller\Argument;
use In2code\Femanager\Domain\Model\User;
use In2code\Femanager\Domain\Repository\UserGroupRepository;
use In2code\Femanager\Domain\Repository\UserRepository;
use In2code\Femanager\Domain\Service\SendMailService;
use In2code\Femanager\Finisher\FinisherRunner;
use In2code\Femanager\Utility\LogUtility;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

/**
 * Class NewController
 */
class NewController extends \In2code\Femanager\Controller\NewController
{
    protected DmailCategoryRepository $dmailCategoryRepository;

    public function __construct(
        UserRepository $userRepository,
        UserGroupRepository $userGroupRepository,
        PersistenceManager $persistenceManager,
        SendMailService $sendMailService,
        FinisherRunner $finisherRunner,
        LogUtility $logUtility,
        DmailCategoryRepository $dmailCategoryRepository
    ) {
        $this->dmailCategoryRepository = $dmailCategoryRepository;
        parent::__construct(
            $userRepository,
            $userGroupRepository,
            $persistenceManager,
            $sendMailService,
            $finisherRunner,
            $logUtility
        );
    }

    /**
     * Workaround to avoid php7 warnings of wrong type hint.
     */
    public function initializeNewAction(): void
    {
        if ($this->arguments->hasArgument('user')) {
            /** @var Argument $user */
            $user = $this->arguments['user'];
            $user->setDataType(\Derhansen\FemanagerDmailSubscribe\Domain\Model\User::class);
        }
    }

    /**
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("user")
     */
    public function newAction(User $user = null): ResponseInterface
    {
        $dmailCategories = $this->dmailCategoryRepository->findAll();
        $this->view->assign('dmailCategories', $dmailCategories);
        return parent::newAction();
    }

    /**
     * Workaround to avoid php7 warnings of wrong type hint.
     */
    public function initializeCreateAction(): void
    {
        if ($this->arguments->hasArgument('user')) {
            /** @var Argument $user */
            $user = $this->arguments['user'];
            $user->setDataType(\Derhansen\FemanagerDmailSubscribe\Domain\Model\User::class);
        }
    }

    /**
     * @TYPO3\CMS\Extbase\Annotation\Validate("In2code\Femanager\Domain\Validator\ServersideValidator", param="user")
     * @TYPO3\CMS\Extbase\Annotation\Validate("In2code\Femanager\Domain\Validator\PasswordValidator", param="user")
     * @TYPO3\CMS\Extbase\Annotation\Validate("In2code\Femanager\Domain\Validator\CaptchaValidator", param="user")
     */
    public function createAction(User $user)
    {
        parent::createAction($user);
    }
}
