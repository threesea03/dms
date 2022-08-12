<div class="flex flex-col">
    <div class="flex gap-4" >
      {{ $slot }}
      <span class="font-bold text-xl">{{ $header }}</span>
    </div>

    <div class="flex justify-end">
      <span class="text-truncate text-4xl">{{ $count }}</span>
    </div>
</div>