@if($menu)
    <div class="menu classic">
        <ul id="nav" class="menu">
            @include('pink.parts.customMenuItems',['items' => $menu->roots()])
        </ul>
    </div>
@endif
