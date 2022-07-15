<?php
namespace App\Domain\Usecases\Shopping;

use App\Domain\Entities\Shopping;
use App\Domain\Ports\Usecases\FindUsecasePort;
use App\Domain\Ports\Repositories\Repository;

class FindShoppingUsecase implements FindUsecasePort
{
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): Shopping
    {
        return $this->repository->find($id);
    }

}