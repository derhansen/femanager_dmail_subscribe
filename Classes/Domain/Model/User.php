<?php
namespace Derhansen\FemanagerDmailSubscribe\Domain\Model;

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

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class User
 */
class User extends \In2code\Femanager\Domain\Model\User
{
    protected bool $moduleSysDmailNewsletter = false;
    protected bool $moduleSysDmailHtml = true;

    /**
     * @var ObjectStorage<DmailCategory>|null
     */
    protected ?ObjectStorage $moduleSysDmailCategory = null;

    public function __construct()
    {
        $this->moduleSysDmailCategory = new ObjectStorage();
        parent::__construct();
    }

    public function getModuleSysDmailNewsletter(): bool
    {
        return $this->moduleSysDmailNewsletter;
    }

    public function setModuleSysDmailNewsletter(bool $moduleSysDmailNewsletter): void
    {
        $this->moduleSysDmailNewsletter = $moduleSysDmailNewsletter;
    }

    public function getModuleSysDmailCategory(): ?ObjectStorage
    {
        return $this->moduleSysDmailCategory;
    }

    public function setModuleSysDmailCategory(ObjectStorage $moduleSysDmailCategory): void
    {
        $this->moduleSysDmailCategory = $moduleSysDmailCategory;
    }

    public function getModuleSysDmailHtml(): bool
    {
        return $this->moduleSysDmailHtml;
    }

    public function setModuleSysDmailHtml(bool $moduleSysDmailHtml): void
    {
        $this->moduleSysDmailHtml = $moduleSysDmailHtml;
    }
}
