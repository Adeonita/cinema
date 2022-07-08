<?php
namespace App\Domain\Factories;

use App\Domain\Repositories\UserRepository;
use App\Domain\Usecases\SaveUserUsecase;
use App\Infra\Database\MySQL;

class SaveUserUsecaseFactory {

    public static function create(): SaveUserUsecase {
        $database = new MySQL();
        $userRepository = new UserRepository($database);
        $saveUserUsecase = new SaveUserUsecase($userRepository);

        return $saveUserUsecase;
    }

}