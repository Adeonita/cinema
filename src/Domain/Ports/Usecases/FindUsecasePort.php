<?php
namespace App\Domain\Entities\Ports\Usecases;

interface FindUsecasePort {

    public function execute(int $id);

}