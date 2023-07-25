<div>
  <input wire:model.live="search">

  @foreach ($contacts as $contact)
    <div>{{ $contact->first_name }}</div>
  @endforeach
</div>
