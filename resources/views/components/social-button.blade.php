<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="social-button" style="background-color: {{$backgroundColor ?? '#ffffff'}}; width: {{$width}}; display: flex; border-radius: 5px; color: #ffffff; padding: 5px; gap: 5px">

    @if ($slot)
        <div class="icon">{{ $slot }}</div>
    @endif


    <p class="social-button-Name">{{ $nameOfSocialMidia }}</p>
</div>