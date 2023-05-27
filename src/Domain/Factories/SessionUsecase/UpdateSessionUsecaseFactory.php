<?php
namespace App\Domain\Factories\SessionUsecase;

use App\Infra\Database\MySQL;
use App\Domain\Repositories\SessionRepository;
use App\Domain\Usecases\Session\UpdateSessionUsecase;

class UpdateSessionUsecaseFactory
{
    public static function create(): UpdateSessionUsecase
    {
        $database = new MySQL();
        $repository = new SessionRepository($database);
        $updateUsecase = new UpdateSessionUsecase($repository);

        return $updateUsecase;
    }
}
