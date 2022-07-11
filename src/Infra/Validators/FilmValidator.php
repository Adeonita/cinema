<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Film;

class FilmValidator {

  public function validateCreate()
  {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $director = $_POST['director'];
    $ageRating = $_POST['ageRating'];
    $mainActor = $_POST['mainActor'];
    $is_three_dimentions = $_POST['is_three_dimentions'];

    $requiredFileds = ($title && $duration && $director && 
      $ageRating && $mainActor && $category) || $is_three_dimentions;

    if ($requiredFileds) {
      return new Film(
        null,
        $title,
        $duration,
        $director,
        $ageRating,
        $mainActor,
        $is_three_dimentions,
        $category
      );
    }

    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
}