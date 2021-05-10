<?php
declare(strict_types=1);

namespace App\Security;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class ApiUser
 */
class ApiUser implements UserInterface
{

    private string $id;
    private string $name;
    private string $email;
    private string $password;
    private string|null $apiToken = null;
    private array $roles = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return ApiUser
     */
    public function setId(string $id): ApiUser
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return ApiUser
     */
    public function setName(string $name): ApiUser
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return ApiUser
     */
    public function setEmail(string $email): ApiUser
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return ApiUser
     */
    public function setPassword(string $password): ApiUser
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiToken(): ?string
    {
        return $this->apiToken;
    }

    /**
     * @param string|null $apiToken
     *
     * @return ApiUser
     */
    public function setApiToken(?string $apiToken): ApiUser
    {
        $this->apiToken = $apiToken;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     *
     * @return ApiUser
     */
    public function setRoles(array $roles): ApiUser
    {
        $this->roles = $roles;

        return $this;
    }

    public function getSalt(): string
    {
        // we do not use a salt
        return '';
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function eraseCredentials(): void
    {
        $this->password = '';
        $this->apiToken = '';
    }
}
