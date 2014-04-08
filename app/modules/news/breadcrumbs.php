<?php

// TODO: fix
Breadcrumbs::register('admin.group.edit', function($breadcrumbs) {
    $breadcrumbs->parent('admin.group.list');
    $breadcrumbs->push('Edit user group', route('admin.group.edit'));
});
