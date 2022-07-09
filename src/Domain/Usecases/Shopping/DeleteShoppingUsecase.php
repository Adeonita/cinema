<?php
namespace App\Domain\Usecases\Shopping;

use App\Domain\Ports\Usecases\DeleteUsecasePort;
use App\Domain\Ports\Repositories\Repository;

class DeleteShoppingUsecase implements DeleteUsecasePort{
    
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