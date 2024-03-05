<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Liste des permissions

        // 1- Gestion des utilisateurs

        // Donner à un utilisateur la permission d'afficher le tableau de bord
        Permission::create(['name' => 'user.index']);
        // Donner à un utilisateur la permission d'ajouter un utilisateur
        Permission::create(['name' => 'user.create']);
        // Donner à un utilisateur la permission de lister tous les utilisateurs
        Permission::create(['name' => 'user.all']);
        // Donner à un utilisateur la permission d'afficher un utilisateur
        Permission::create(['name' => 'user.show']);
        // Donner à un utilisateur la permission de modifier un utilisateur
        Permission::create(['name' => 'user.edit']);
        // Donner la permission à un utilisateur de supprimer un utilisateur
        Permission::create(['name' => 'user.destroy']);
        
        // 2- Gestion des roles

        // Donner à un utilisateur la permission d'ajouter un rôle
        Permission::create(['name' => 'role.create']);
        // Donner à un utilisateur la permission de lister tous les rôles
        Permission::create(['name' => 'role.index']);
        // Donner à un utilisateur la permission d'afficher un rôle
        Permission::create(['name' => 'role.show']);
        // Donner à un utilisateur la permission de modifier un rôle
        Permission::create(['name' => 'role.edit']);
        // Donner à un utilisateur la permission de supprimer un rôle
        Permission::create(['name' => 'role.destroy']);

        // 3- Gestion des catégories

        // Donner à un utilisateur la permission d'ajouter une catégorie
        Permission::create(['name' => 'categorie.create']);
        // Donner à un utilisateur la permission de lister toutes les catégories
        Permission::create(['name' => 'categorie.index']);
        // Donner à un utilisateur la permission d'afficher une catégorie
        Permission::create(['name' => 'categorie.show']);
        // Donner à un utilisateur la permission de modifier une catégorie
        Permission::create(['name' => 'categorie.edit']);
        // Donner à un utilisateur la permission de supprimer une catégorie
        Permission::create(['name' => 'categorie.destroy']);

        // 4- Gestion des régions

        // Donner à un utilisateur la permission de lister toutes les régions
        Permission::create(['name' => 'region.index']);
        // Donner à un utilisateur la permission d'afficher une région
        Permission::create(['name' => 'region.show']);

        // 5- Gestion des logements

        // Donner la permission à un utilisateur d'afficher la liste des logements
        Permission::create(['name' => 'logement.all']);
        // Donner la permission à un utilisateur d'afficher la liste des logements à modérer
        Permission::create(['name' => 'user.moderer']);    
        // Donner la permission à un utilisateur d'approuver un logement
        Permission::create(['name' => 'user.approve']);
        // Donner à un utilisateur la permission de refuser un logement
        Permission::create(['name' => 'user.refuse']);
        // Donner la permission à un utilisateur d'afficher la liste des logements obsolètes  
        Permission::create(['name' => 'user.obsoletes']);
        // Donner à un utilisateur la permission d'ajouter une semaine à la date limite de publication pour prolonger l’annonce
        Permission::create(['name' => 'user.addweek']);
        // Donner la permission à un utilisateur de supprimer définitivement un logement
        //Permission::create(['name' => 'user.destroy']);

        // Donner la permission à un utilisateur d'afficher les logements actifs
        Permission::create(['name' => 'user.actives']);
        // Donner la permission à un utilisateur d'afficher les logements en attente
        Permission::create(['name' => 'user.attente']);
        // Donner la permission à un utilisateur d'afficher les logements obsolètes
        Permission::create(['name' => 'user.obsolete']);

        // 6- Gestion des message

        // Donner la permission à un utilisateur d'afficher la liste des messages à modérer
        Permission::create(['name' => 'user.messages']);
        // Donner la permission à un utilisateur d'approuver un message
        Permission::create(['name' => 'user.message.approve']);
        // Donner la permission à un utilisateur de refuser un message
        Permission::create(['name' => 'user.message.refuse']);



        // Créer le rôle superadmin
        $superadmin = Role::create(['name' => 'superadmin']);
        // Lui attribuer toutes les permissions
        $superadmin->givePermissionTo(Permission::all());

        // Créer le rôle admin
        $admin = Role::create(['name' => 'admin']);
        // Lui attribuer des permissions
        $admin->givePermissionTo([
            'user.index',
            'user.create',
            'user.all',
            'user.show',
            'user.edit',
            'user.destroy',
            'role.create',
            'role.index',
            'role.show',
            'role.edit',
            //'role.destroy',
            'categorie.create',
            'categorie.index',
            'categorie.show',
            'categorie.edit',
            'categorie.destroy',
            'region.index',
            'region.show',
            'logement.all',
            'user.moderer',
            'user.approve',
            'user.refuse',
            'user.obsoletes',
            'user.addweek',
            'user.messages',
            'user.message.approve',
            'user.message.refuse'
        ]);

        // Créer le rôle démarcheur
        $demarcheur = Role::create(['name' => 'demarcheur']);
        // Lui attribuer des permissions
        $demarcheur->givePermissionTo([
            'user.index',
            'user.actives',
            'user.obsolete',
            'user.attente'
        ]);
    }
}
