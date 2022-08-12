<div class="flex flex-col">
  <div class="flex gap-4" >
    {{ $slot }}
    <span class="font-bold text-4xl">{{ $header }}</span>
  </div>

  <div class="flex justify-end" style="margin-top:80px">
    <span class="text-truncate text-5xl">{{ $count }}</span>
  </div>
</div>