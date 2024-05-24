<?php 

namespace Model;

class Servicio {
    protected string $username;
    protected string $password;

    public function __construct(string $username, string $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     *
     * @param string $command
     * @param array $args
     * @return string
     */
    public function buildCommand(string $command, array $args = []): string {
        $command = escapeshellcmd($command);
        $args = array_map('escapeshellarg', $args);
        return $command . ' ' . implode(' ', $args);
    }

}

