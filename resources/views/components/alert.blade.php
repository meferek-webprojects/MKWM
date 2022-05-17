<div class="notifi alert alert-custom alert-indicator-top 
            @if($type == "success")
                indicator-success
            @elseif($type == "warning")
                indicator-warning
            @elseif($type == "info")
                indicator-info
            @elseif($type == "danger")
                indicator-danger
            @endif
" role="alert">
    <div class="alert-content">
        <span class="alert-title">
            @if($type == "success")
                Sukcess!
            @elseif($type == "warning")
                Uwaga!
            @elseif($type == "info")
                Informacja
            @elseif($type == "danger")
                Uwaga
            @endif
        </span>
        <span class="alert-text">{{ $message }}</span>
    </div>
</div>