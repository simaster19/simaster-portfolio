<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class RolePermissionSeeder extends Seeder
{
  /**
  * Run the database seeds.
  */
  public function run(): void
  {
    $superAdmin = Role::create(["name" => "super-admin"]);
    $penulis = Role::create(["name" => "pengguna"]);

    //Penulis/Pengguna
    Permission::create(["name" => "create posts"]);
    Permission::create(["name" => "read posts"]);
    Permission::create(["name" => "update posts"]);
    Permission::create(["name" => "delete posts"]);
    Permission::create(["name" => "upload media"]);
    Permission::create(["name" => "view statistic"]);

    //Category
    Permission::create(["name" => "create category"]);
    Permission::create(["name" => "read category"]);
    Permission::create(["name" => "update category"]);
    Permission::create(["name" => "delete category"]);

    //Label
    Permission::create(["name" => "create labels"]);
    Permission::create(["name" => "read labels"]);
    Permission::create(["name" => "update labels"]);
    Permission::create(["name" => "delete labels"]);



    //Super Admin
    //Dashboard
    Permission::create(["name" => "view dashboard"]);
    //Users
    Permission::create(["name" => "create users"]);
    Permission::create(["name" => "read users"]);
    Permission::create(["name" => "update users"]);
    Permission::create(["name" => "delete users"]);

    //Project
    Permission::create(["name" => "create projects"]);
    Permission::create(["name" => "read projects"]);
    Permission::create(["name" => "update projects"]);
    Permission::create(["name" => "delete projects"]);

    //Skill
    Permission::create(["name" => "create skills"]);
    Permission::create(["name" => "read skills"]);
    Permission::create(["name" => "update skills"]);
    Permission::create(["name" => "delete skills"]);

    //Message
    Permission::create(["name" => "read messages"]);
    Permission::create(["name" => "update messages"]);
    Permission::create(["name" => "delete messages"]);

    //Testimoni
    Permission::create(["name" => "create testimoni"]);
    Permission::create(["name" => "read testimoni"]);
    Permission::create(["name" => "update testimoni"]);
    Permission::create(["name" => "delete testimoni"]);

    //Certificate
    Permission::create(["name" => "create certificate"]);
    Permission::create(["name" => "read certificate"]);
    Permission::create(["name" => "update certificate"]);
    Permission::create(["name" => "delete certificate"]);

    //CV
    Permission::create(["name" => "create cv"]);
    Permission::create(["name" => "update cv"]);
    Permission::create(["name" => "download cv"]);
    Permission::create(["name" => "delete cv"]);

    $permission = Permission::all();

    $userSuperAdmin = User::find(1);
    $userSuperAdmin->assignRole("super-admin");
    $userSuperAdmin->syncPermissions($permission);

    $userPengguna = User::find(2);
    $userPengguna->assignRole("pengguna");
    $userPengguna->syncPermissions([
      "create posts", "read posts", "update posts", "delete posts", "view statistic", "upload media", "create category", "read category", "update category", "delete category", "create labels", "read labels", "update labels", "delete labels"
    ]);
  }
}