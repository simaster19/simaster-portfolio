<?php

namespace App\Helpers;

class ListBahasaPemograman
{
  public static function listBahasa() {
    return [
      "PHP",
      "JAVASCRIPT",
      "JAVA",
      "JQUERY",
      "LARAVEL",
      "CODEIGNITER",
      "VUEJS"
    ];
  }

  public static function jenisProject() {
    return [
      "WEB",
      "DESKTOP",
      "ANDROID"
    ];
  }

  public static function statusProject() {
    return [
      "PERSONAL",
      "FREELANCE",
      "ONLINE COURSE"
    ];
  }

  public static function levelSkill() {
    return [
      "BEGINNER",
      "INTERMEDIATE",
      "PRO"
    ];
  }
  
  public static function typeSkill(){
    return [
      "BAHASA","FRAMEWORK","LAINNYA"
      ];
  }
}