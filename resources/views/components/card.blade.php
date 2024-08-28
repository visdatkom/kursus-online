<div class="card card-dark">
    <div class="card-header">
        <h1 class="card-title">{{ $title }}</h1>
    </div>
    <div {{ $attributes->merge(['class' => 'card-body p-0']) }}>
        {{ $slot }}
    </div>
</div>
