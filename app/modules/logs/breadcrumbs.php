<?php
Breadcrumbs::setView('admin::layouts.default.breadcrumb');

Breadcrumbs::register('admin.logs', function($breadcrumbs) {
    $breadcrumbs->push('Logs list', route('admin.logs'));
});
Breadcrumbs::register('admin.logsByUser', function($breadcrumbs) {
    $breadcrumbs->push('User logs list', route('admin.logs'));
});
Breadcrumbs::register('admin.logsByLevel', function($breadcrumbs) {
    $breadcrumbs->push('Level logs list', route('admin.logs'));
});
Breadcrumbs::register('admin.log.view', function($breadcrumbs) {
    $breadcrumbs->push('View log', route('admin.logs'));
});

