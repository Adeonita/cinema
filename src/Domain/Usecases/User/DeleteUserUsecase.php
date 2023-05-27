<?php
namespace App\Domain\Usecases\User;

use App\Domain\Ports\Usecases\DeleteUsecasePort;
use App\Domain\Ports\Repositories\Repository;

class DeleteUserUsecase implements DeleteUsecasePort
{   
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        $this->repository->delete($id);
    }

}