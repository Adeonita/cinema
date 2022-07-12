<?php
namespace App\Infra\Controllers;

use App\Infra\Validators\TicketValidator;
use App\Domain\Factories\TicketUsecase\CreateTicketUsecaseFactory;

class TicketController extends Controller
{
  public function create()
  {
    $validator = new TicketValidator();
    $validator->validateCreate();
  }
}
