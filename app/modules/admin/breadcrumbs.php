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
