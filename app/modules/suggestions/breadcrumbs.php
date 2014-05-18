<?php
Breadcrumbs::setView('admin::layouts.default.breadcrumb');

Breadcrumbs::register('admin.suggestions', function($breadcrumbs) {
    $breadcrumbs->push('Suggestions list', route('admin.suggestions'));
});
