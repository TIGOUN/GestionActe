<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'post-list',
           'post-create',
           'post-edit',
           'post-delete',
           'Acte-list',
           'Acte-create',
           'Acte-edit',
           'Acte-delete',
           'Contact-list',
           'Contact-create',
           'Contact-edit',
           'Contact-delete',
           'Admission-list',
           'Admission-create',
           'Admission-edit',
           'Admission-delete',
           'Demande-list',
           'Demande-create',
           'Demande-edit',
           'Demande-delete',
           'Departement-list',
           'Departement-create',
           'Departement-edit',
           'Departement-delete',
           'Document-list',
           'Document-create',
           'Document-edit',
           'Document-delete',
           'ProgrammationEvaluation-list',
           'ProgrammationEvaluation-create',
           'ProgrammationEvaluation-edit',
           'ProgrammationEvaluation-delete',
           'ProgrammationSoutenance-list',
           'ProgrammationSoutenance-create',
           'ProgrammationSoutenance-edit',
           'ProgrammationSoutenance-delete',
           'ResultatSemestrielle-list',
           'ResultatSemestrielle-create',
           'ResultatSemestrielle-edit',
           'ResultatSemestrielle-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}