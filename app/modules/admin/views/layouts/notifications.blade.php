@if (Notification::showSuccess())
    <div class="alert alert-success">
        {{ Notification::showSuccess(':message <br />') }}
    </div>
@endif

@if (Notification::showDanger())
<div class="alert alert-danger">
    {{ Notification::showDanger(':message <br />') }}
</div>
@endif

@if (Notification::showWarning())
<div class="alert alert-warning">
    {{ Notification::showWarning(':message <br />') }}
</div>
@endif

@if (Notification::showInfo())
<div class="alert alert-info">
    {{ Notification::showInfo(':message <br />') }}
</div>
@endif