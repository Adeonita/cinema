<?php
namespace App\Domain\Usecases\User;

use App\Domain\Ports\Usecases\FindUsecasePort;
use App\Domain\Ports\Repositories\Repository;

class FindUserUsecase implements FindUsecasePort {

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        return $this->repository->find($id);
    }

}