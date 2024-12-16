{{--<x-menu.base.li-menuitem :routes="'trans'" :label="'Cash Book'"/>
<x-menu.base.li-menuitem :routes="'trans'" :label="'Bank Book'"/>--}}
{{--<x-menu.base.route-menuitem  href="{{route('trans',[1])}}" :label="'Cash Book'"/>--}}
{{--<x-menu.base.route-menuitem  href="{{route('trans',[2])}}" :label="'Bank Book'"/>--}}
<x-menu.base.route-menuitem href="{{route('bankBooks',[2])}}" :label="'Bank Books'"/>
<x-menu.base.route-menuitem href="{{route('cashBooks',[3])}}" :label="'Cash Books'"/>

