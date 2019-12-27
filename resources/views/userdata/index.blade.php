@extends('layouts.app')

@section('content')
<div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Laravel Ecommerce User Account Page</h3>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Account Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- content  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- user profile  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card influencer-profile-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="text-center">
                                    <img src="{{ Gravatar::src(auth()->user()->email) }}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                    </div>
                                </div>
                                <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                    <div class="user-avatar-info">
                                        <div class="m-b-20">
                                            <div class="user-avatar-name">
                                                <h2 class="mb-1">{{ auth()->user()->userdata->name }}</h2>
                                            </div>
                                            <div class="rating-star  d-inline-block">
                                            </div>
                                        </div>
                                        <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
                                        <div class="user-avatar-address">
                                            <p class="border-bottom pb-3">
                                                <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>
                                                  {{ auth()->user()->userdata->country }},
                                                  {{ auth()->user()->userdata->zip }} {{ auth()->user()->userdata->city }},
                                                  {{ auth()->user()->userdata->address }}
                                                </span>
                                                <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Joined date: {{ auth()->user()->created_at->format('Y/m/d') }}  </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end user profile  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- widgets   -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- info widgets   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- contact phone   -->
                <!-- ============================================================== -->
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline-block">
                                <h5 class="text-muted">Phone</h5>
                                <h2 class="mb-0">{{ auth()->user()->userdata->phone }}</h2>
                            </div>
                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                <i class="fa fa-phone fa-fw fa-sm text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- contact phone   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- contact email   -->
                <!-- ============================================================== -->
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline-block">
                                <h5 class="text-muted">Email</h5>
                                <h2 class="mb-0"> {{ auth()->user()->email }}</h2>
                            </div>
                            <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- contact email   -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end widgets   -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- campaign activities   -->
                <!-- ============================================================== -->
                <div class="col-lg-12">
                    <div class="section-block">
                        <h3 class="section-title">My Orders</h3>
                    </div>
                    <div class="card">
                        <div class="campaign-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0">Id</th>
                                        <th class="border-0">Order Amount</th>
                                        <th class="border-0">Placed At</th>
                                        <th class="border-0">Status</th>
                                        <th class="border-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach(auth()->user()->orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>${{ $order->order_total }}</td>
                                        <td>{{ $order->created_at->format('Y/m/d - H:i') }}</td>
                                        <td>
                                          @if($order->status=="Pending")
                                          <span class="badge badge-warning badge-status">
                                          @elseif($order->status=="Shipping")
                                          <span class="badge badge-info badge-status">
                                          @else
                                          <span class="badge badge-success badge-status">
                                          @endif
                                            {{ $order->status }}
                                          </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.single', $order->id) }}" class="btn btn-success btn-xs">View</a>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end campaign activities   -->
                <!-- ============================================================== -->
            </div>
                            <!-- ============================================================== -->
                            <!-- end content  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
@endsection
