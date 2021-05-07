<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block']) }}>
    {{ $slot }}
</button>
