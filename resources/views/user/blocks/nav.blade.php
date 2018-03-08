<div id="categorymenu">
    <nav class="subnav">
        <ul class="nav-pills categorymenu">
            <li><a href="{{ url('/') }}">Home</a> </li>
            <?php
                $menu_level_1 = DB::table('cates')->where('parent_id', 0)->get();
            ?>
            @foreach($menu_level_1 as $item_1)
            <li><a>{{ $item_1->name }}</a>
                <div>
                    <?php
                        $menu_level_2 = DB::table('cates')->where('parent_id', $item_1->id)->get();
                    ?>
                    <ul>
                        @foreach($menu_level_2 as $item_2)
                        <li><a href="{{ URL('loai-san-pham', [$item_2->id, $item_2->alias]) }}">{{ $item_2->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
            @endforeach
            <li><a href="{{ url('lien-he') }}">Contact</a> </li>
        </ul>
    </nav>
</div>