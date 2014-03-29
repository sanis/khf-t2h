<?php
Breadcrumbs::setView('admin::layouts.default.breadcrumb');
Breadcrumbs::register('admin.dashboard', function($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::register('admin.account', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Edit account', route('admin.account'));
});
Breadcrumbs::register('admin.account.post', function($breadcrumbs) {
    $breadcrumbs->parent('admin.account');
    $breadcrumbs->push('Save account settings', route('admin.account'));
});

Breadcrumbs::register('admin.user.list', function($breadcrumbs) {
    $breadcrumbs->push('View users list', route('admin.user.list'));
});

Breadcrumbs::register('admin.group.list', function($breadcrumbs) {
    $breadcrumbs->push('View groups list', route('admin.group.list'));
});

Breadcrumbs::register('admin.group.add', function($breadcrumbs) {
    $breadcrumbs->parent('admin.group.list');
    $breadcrumbs->push('Add user group', route('admin.group.add'));
});

Breadcrumbs::register('admin.group.edit', function($breadcrumbs) {
    $breadcrumbs->parent('admin.group.list');
    $breadcrumbs->push('Edit user group', route('admin.group.edit'));
});

Breadcrumbs::register('admin.group.edit.post', function($breadcrumbs) {
    $breadcrumbs->parent('admin.group.list');
    $breadcrumbs->push('Edit user group', route('admin.group.edit.post'));
});
