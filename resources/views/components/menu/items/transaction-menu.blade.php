{{--<x-menu.base.li-menuitem :routes="'trans'" :label="'Cash Book'"/>
<x-menu.base.li-menuitem :routes="'trans'" :label="'Bank Book'"/>--}}
{{--<x-menu.base.route-menuitem  href="{{route('trans',[1])}}" :label="'Cash Book'"/>--}}
{{--<x-menu.base.route-menuitem  href="{{route('trans',[2])}}" :label="'Bank Book'"/>--}}

<x-menu.base.route-menuitem  href="{{route('bankBooks')}}" :label="'Bank Books'"/>
<x-menu.base.route-menuitem  href="{{route('cashBooks')}}" :label="'Cash Books'"/>
<x-menu.base.li-menuitem :routes="'accBooks'" :label="'Account Book'"/>

