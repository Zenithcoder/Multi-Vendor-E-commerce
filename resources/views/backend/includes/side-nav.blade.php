<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="{{current_page('admin') ? 'active' : ''}}"><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Add Category</span></a>
            <ul>
                <li class="{{current_page('categories') ? 'active' : ''}}"> <a href="/categories"><i class="icon icon-signal"></i> <span>Categories</span></a> </li>
                <li class="{{current_page('brands') ? 'active' : ''}}"> <a href="/brands"><i class="icon icon-inbox"></i> <span>Sub Category</span></a> </li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Add Attribute</span></a>
        <ul>
        <li class="{{current_page('attribute') ? 'active' : ''}}"><a href="/attribute"><i class="icon icon-fullscreen"></i> <span>Attribute</span></a></li>
        <li class="{{current_page('attribute_set') ? 'active' : ''}}"><a href="/attribute_set"><i class="icon icon-fullscreen"></i> <span>Attribute Set</span></a></li>
        </ul>
        </li>

        <li class="{{current_page('products') ? 'active' : ''}}"><a href="/products"><i class="icon icon-th"></i> <span>Products</span></a>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span></a>
            <ul>
                <li class="{{current_page('orders/pending') ? 'active' : ''}}"> <a href="/orders/pending"><i class="icon icon-signal"></i> <span>Pending Orders</span></a> </li>
                <li class="{{current_page('orders/delivered') ? 'active' : ''}}"> <a href="/orders/delivered"><i class="icon icon-inbox"></i> <span>Delivered Orders</span></a> </li>
                <li class="{{current_page('orders') ? 'active' : ''}}"> <a href="/orders"><i class="icon icon-inbox"></i> <span>All Orders</span></a> </li>
            </ul>
        </li>
        <li class="{{current_page('manage_users') ? 'active' : ''}}"><a href="/manage_users"><i class="icon icon-fullscreen"></i> <span>Users</span></a></li>

    </ul>
</div>