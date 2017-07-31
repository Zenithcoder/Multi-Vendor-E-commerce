@extends('backend.layout_backend')

@section('content')



    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-home"></i>Dashboard</h2>
            </div>

            <div class="box-content">
                <div  class="quick-actions_homepage">
                    <ul class="quick-actions">
                    <li class="bg_lo span3"> <a href="#"> <i class="icon-group"></i><strong>9540</strong> <small>Total Users</small></a></li>
                    <li class="bg_ly span3"> <a href="#"> <i class="icon-shopping-cart"></i><strong>9540</strong> <small>Total Products</small></a></li>
                    <li class="bg_lg span3"> <a href="#"> <i class="icon-tag"></i><strong>9540</strong> <small>Total Orders</small></a></li>

                    </ul>
                </div>
            </div>
        </div><!--/span-->


    </div><!--/span-->

    @endsection