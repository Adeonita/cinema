<?php
namespace App\Domain\Factories\RoomUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\RoomRepository;
use App\Domain\Usecases\Room\UpdateRoomUsecase;

class UpdateRoomUsecaseFactory
{
    public static function create(): UpdateRoomUsecase
    {
        $database = new MySQL();
        $repository = new RoomRepository($database);
        $updateUsecase = new UpdateRoomUsecase($repository);

        return $updateUsecase;
    }
}
