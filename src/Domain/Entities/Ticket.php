<?php
namespace App\Domain\Entities;

use App\Domain\Entities\Session;

class Ticket {

    public int $id;
    public float $price;
    public string $date;
    public User $user;
    public bool $is_student;
    public Session $session;

}