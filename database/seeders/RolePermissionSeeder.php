<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'blog.view', 'blog.create', 'blog.update', 'blog.delete',
            'faq.view', 'faq.create', 'faq.update', 'faq.delete',
            'changelog.view', 'changelog.create', 'changelog.update', 'changelog.delete',
            'feature.view', 'feature.create', 'feature.update', 'feature.delete',
            'page.view', 'page.create', 'page.update', 'page.delete',
            'setting.view', 'setting.create', 'setting.update', 'setting.delete',
            'agent.view', 'agent.create', 'agent.update', 'agent.delete',
            'service.view', 'service.create', 'service.update', 'service.delete',
            'homepage.view', 'homepage.create', 'homepage.update', 'homepage.delete',
            'trust-indicator.view', 'trust-indicator.create', 'trust-indicator.update', 'trust-indicator.delete',
            'service-highlight.view', 'service-highlight.create', 'service-highlight.update', 'service-highlight.delete',
            'upload.create',
            'user.view', 'user.create', 'user.update', 'user.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        $admin = Role::findOrCreate('admin');
        $admin->givePermissionTo(Permission::all());

        $author = Role::findOrCreate('author');
        $author->givePermissionTo([
            'blog.view', 'blog.create', 'blog.update',
            'faq.view',
            'changelog.view',
            'feature.view',
            'page.view',
            'upload.create',
        ]);
    }
}
