<?php
Breadcrumbs::setView('admin::layouts.default.breadcrumb');

Breadcrumbs::register('admin.levels', function($breadcrumbs) {
    $breadcrumbs->push('Levels list', route('admin.levels'));
});
