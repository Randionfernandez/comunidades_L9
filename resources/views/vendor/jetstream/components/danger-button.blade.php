<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-danger btn-lg btn-block']) }}>
    {{ $slot }}
</button>
