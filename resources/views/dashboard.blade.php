<x-slot name="header">
    loremsacsaad
</x-slot>

@auth
@if($role == "admin")
    <x-app-layout>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda quam sunt quae voluptatum voluptates perferendis maxime debitis excepturi provident, exercitationem praesentium, unde nobis minima fugiat quo natus id facere eveniet!
   </x-app-layout>
   @endif
@endauth

