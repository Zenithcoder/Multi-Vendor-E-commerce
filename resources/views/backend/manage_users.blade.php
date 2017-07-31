@extends('backend.layout_backend')

@section('content')

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-user"></i>Manage Users</h2>
            </div>

            <div class="box-content">
                <div  class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li class="bg_lo span3"> <a href="/users"> <i class="icon-group"></i> Admin</a> </li>
                        <li class="bg_ly span3"> <a href="/users/vendors"> <i class=" icon-group"></i> Vendors </a> </li>
                        <li class="bg_lg span3"> <a href="/users/customers"> <i class="icon-group"></i> Customers</a> </li>

                    </ul>
                </div>
            </div>
        </div><!--/span-->


    </div><!--/span-->

@endsection
