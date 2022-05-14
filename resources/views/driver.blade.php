@extends('layouts.driverlayout')
<link href="{{ asset('css/progress.css') }}" rel="stylesheet">
@section('content')
    <main id="main">

        <section id="why-us" class="why-us">
            <div class="container">
                <div class="section-title">
                    <h2>Current Orders</h2>
                    @if (Session::has('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Restaurant</th>
                                <th scope="col">Address</th>
                                <th scope="col">Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @forelse($orders as $order)
                                @php
                                    $isRejected = false;
                                    $isAccepted = false;
                                    if (isset($order->rejected_driver_ids)) {
                                        $rejectedDriver = explode(',', $order->rejected_driver_ids);
                                        if (in_array(Auth::user()->id, $rejectedDriver)) {
                                            $isRejected = true;
                                        }
                                    }
                                    if (isset($order->accepted_driver_id)) {
                                        if (Auth::user()->id == $order->accepted_driver_id) {
                                            $isAccepted = true;
                                        }
                                    } else {
                                        $isAccepted = true;
                                    }
                                @endphp
                                @if (!$isRejected and $isAccepted)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $order->id }}
                                        </td>
                                        <td>
                                            {{ $order->restaurant_name }}
                                        </td>
                                        <td>
                                            {{ $order->name }} <br />
                                            {{ $order->address }}
                                        </td>
                                        <td>
                                            {{ isset($order->deliverlatertime) ? $order->deliverlatertime : '-' }}
                                        </td>
                                        <td>
                                            @if ($order->status == 'created')
                                                <button type="button"
                                                    onclick="window.location.href = '{{ url('/driver/status?status=rejected&order_id=' . $order->id) }}';"
                                                    class="btn btn-sm btn-danger">
                                                    Reject
                                                </button>
                                                <button type="button"
                                                    onclick="window.location.href = '{{ url('/driver/status?status=accepted&order_id=' . $order->id) }}';"
                                                    class="btn btn-sm btn-success">
                                                    Accept
                                                </button>
                                            @endif
                                            @if ($order->status == 'accepted')
                                                <button type="button"
                                                    onclick="window.location.href = '{{ url('/driver/status?status=delivery&order_id=' . $order->id) }}';"
                                                    class="btn btn-sm btn-secondary">
                                                    Collected
                                                </button>
                                                <a class="btn btn-primary btn-sm text-center" data-toggle="modal"
                                                    id="mediumButton" data-target="#mediumModal-{{ $order->id }}"
                                                    data-attr="{{ route('reservation.show', $order->id) }}" title="show">
                                                    Track
                                                </a>
                                            @endif
                                            @if ($order->status == 'delivery')
                                                <button type="button"
                                                    onclick="window.location.href = '{{ url('/driver/status?status=delivered&order_id=' . $order->id) }}';"
                                                    class="btn btn-sm btn-warning">
                                                    Delivered
                                                </button>
                                                <a class="btn btn-primary btn-sm text-center" data-toggle="modal"
                                                    id="mediumButton" data-target="#mediumModal-{{ $order->id }}"
                                                    data-attr="{{ route('reservation.show', $order->id) }}" title="show">
                                                    Track
                                                </a>
                                            @endif

                </div>
                </td>
                <div class="modal fade" id="mediumModal-{{ $order->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Order id
                                    #{{ $order->id }}</h3>
                            </div>
                            <div class="modal-body" id="smallBody">
                                <div>
                                    <div class="form-group">
                                        <label for="created">created at</label>
                                        <input type="text" value="{{ $order->created_at }}" class="form-control"
                                            id="created" name="created" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="restaurant">restaurant</label> <i class="bi bi-egg-fried"></i>
                                        <input type="text" value="{{ $order->restaurant_name }}" class="form-control"
                                            id="restaurant" readonly>
                                    </div>
                                    <hr>

                                    @if ($order->type == 'delivernow')
                                        <div class="card card-timeline border-none p-3 h-50 text-center"
                                            style="background-color: #ffb347">
                                            <h4 id="estimate" class="text-white">Estimated
                                                delivery time<br>
                                                {{-- {{ date('Y-m-d H:i:s', strtotime($order->created_at))->addMinutes(50) }} --}}
                                            </h4>
                                            <ul class="bs4-order-tracking">
                                                @if ($order->status == 'created')
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-user h-25 pt-2"></i>
                                                        </div> Order Placed
                                                    </li>
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                        </div> In Kitchen
                                                    </li>
                                                    <li class="step tab">
                                                        <div><i class="fas fa-truck pt-2 h-25"></i>
                                                        </div> Out for delivery
                                                    </li>
                                                    <li class="step tab ">
                                                        <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                        </div> Delivered
                                                    </li>
                                                @elseif($order->status == 'accepted')
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-user h-25 pt-2"></i>
                                                        </div> Order Placed
                                                    </li>
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                        </div> In Kitchen
                                                    </li>
                                                    <li class="step">
                                                        <div><i class="fas fa-truck pt-2 h-25"></i>
                                                        </div> Out for delivery
                                                    </li>
                                                    <li class="step tab ">
                                                        <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                        </div> Delivered
                                                    </li>
                                                @elseif($order->status == 'collected')
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-user h-25 pt-2"></i>
                                                        </div> Order Placed
                                                    </li>
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                        </div> In Kitchen
                                                    </li>
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-truck pt-2 h-25"></i>
                                                        </div> Out for delivery
                                                    </li>
                                                    <li class="step tab ">
                                                        <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                        </div> Delivered
                                                    </li>
                                                @elseif($order->status == 'delivery')
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-user h-25 pt-2"></i>
                                                        </div> Order Placed
                                                    </li>
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                        </div> In Kitchen
                                                    </li>
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-truck pt-2 h-25"></i>
                                                        </div> Out for delivery
                                                    </li>
                                                    <li class="step tab ">
                                                        <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                        </div> Delivered
                                                    </li>
                                                @elseif($order->status == 'delivered')
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-user h-25 pt-2"></i>
                                                        </div> Order Placed
                                                    </li>
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                        </div> In Kitchen
                                                    </li>
                                                    <li class="step active tab">
                                                        <div><i class="fas fa-truck pt-2 h-25"></i>
                                                        </div> Out for delivery
                                                    </li>
                                                    <li class="step active tab ">
                                                        <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                        </div> Delivered
                                                    </li>
                                                @endif
                                            </ul>
                                            @if ($order->status == 'created')
                                                <p id="kitchen" class="text-center text-white display-7"><b>In
                                                        Kitchen</b>. Your food is being processed!
                                                </p>
                                            @elseif($order->status == 'delivery')
                                                <p id="delivery" class="text-center text-white display-7"><b>Out
                                                        for delivery</b>. Your food is on the way!
                                                </p>
                                            @elseif($order->status == 'delivered')
                                                <p id="delivered" class="text-center text-white display-7">
                                                    <b>Order delivered</b>. Your food is delivered.
                                                    Bon appétit!
                                                </p>
                                            @endif
                                        </div>
                                    @endif

                                    @if ($order->type == 'deliverlater')
                                        <div class="form-group">
                                            <label for="deliverlatertime">delivery time</label>
                                            <input type="text" value="{{ $order->deliverlatertime }}"
                                                class="form-control" id="deliverlatertime" readonly>
                                        </div><br>
                                        <div class="card card-timeline border-none p-3 h-50 text-center"
                                            style="background-color: #ffb347">
                                            <h4 id="estimate" class="text-white">Estimated
                                                delivery time<br>
                                                <?php
                                                $date = strtotime($order->deliverlatertime);
                                                echo date('H:i', strtotime('+50 minutes', $date));
                                                ?>
                                                <ul class="bs4-order-tracking">
                                                    @if ($order->status == 'created')
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-user h-25 pt-2"></i>
                                                            </div> Order Placed
                                                        </li>
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                            </div> In Kitchen
                                                        </li>
                                                        <li class="step tab">
                                                            <div><i class="fas fa-truck pt-2 h-25"></i>
                                                            </div> Out for delivery
                                                        </li>
                                                        <li class="step tab ">
                                                            <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                            </div> Delivered
                                                        </li>
                                                    @elseif($order->status == 'accepted')
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-user h-25 pt-2"></i>
                                                            </div> Order Placed
                                                        </li>
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                            </div> In Kitchen
                                                        </li>
                                                        <li class="step">
                                                            <div><i class="fas fa-truck pt-2 h-25"></i>
                                                            </div> Out for delivery
                                                        </li>
                                                        <li class="step tab ">
                                                            <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                            </div> Delivered
                                                        </li>
                                                    @elseif($order->status == 'collected')
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-user h-25 pt-2"></i>
                                                            </div> Order Placed
                                                        </li>
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                            </div> In Kitchen
                                                        </li>
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-truck pt-2 h-25"></i>
                                                            </div> Out for delivery
                                                        </li>
                                                        <li class="step tab ">
                                                            <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                            </div> Delivered
                                                        </li>
                                                    @elseif($order->status == 'delivery')
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-user h-25 pt-2"></i>
                                                            </div> Order Placed
                                                        </li>
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                            </div> In Kitchen
                                                        </li>
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-truck pt-2 h-25"></i>
                                                            </div> Out for delivery
                                                        </li>
                                                        <li class="step tab ">
                                                            <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                            </div> Delivered
                                                        </li>
                                                    @elseif($order->status == 'delivered')
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-user h-25 pt-2"></i>
                                                            </div> Order Placed
                                                        </li>
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-bread-slice h-25 pt-2"></i>
                                                            </div> In Kitchen
                                                        </li>
                                                        <li class="step active tab">
                                                            <div><i class="fas fa-truck pt-2 h-25"></i>
                                                            </div> Out for delivery
                                                        </li>
                                                        <li class="step active tab ">
                                                            <div><i class="fas fa-birthday-cake pt-2 h-25"></i>
                                                            </div> Delivered
                                                        </li>
                                                    @endif
                                                </ul>
                                                @if ($order->status == 'created')
                                                    <p id="kitchen" class="text-center text-white display-7">
                                                        <b>In Kitchen</b>. Your food is being
                                                        processed!
                                                    </p>
                                                @elseif($order->status == 'delivery')
                                                    <p id="delivery" class="text-center text-white display-7">
                                                        <b>Out for delivery</b>. Your food is on the
                                                        way!
                                                    </p>
                                                @elseif($order->status == 'delivered')
                                                    <p id="delivered" class="text-center text-white display-7">
                                                        <b>Order delivered</b>. Your food is
                                                        delivered. Bon appétit!
                                                    </p>
                                                @endif
                                        </div>
                                    @endif
                                    <br>
                                    <div class="modal-footer pt-4">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </tr>
            @endif

        @empty
            <tr>
                <td colspan="5">No orders found</td>
            <tr>
                @endforelse
                @if ($count == 0)
            <tr>
                <td colspan="5">No orders found</td>
            </tr>
            @endif
            </tbody>
            </table>
            </div>
            <div class="section-title">
                <h2>Previous Orders</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Restaurant</th>
                            <th scope="col">Address</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($delivered_orders as $order)
                            <tr>

                                <td>
                                    {{ $order->id }}
                                </td>
                                <td>
                                    {{ $order->restaurant_name }}
                                </td>
                                <td>
                                    {{ $order->name }} <br />
                                    {{ $order->address }}
                                </td>
                                <td>
                                    {{ isset($order->deliverlatertime) ? $order->deliverlatertime : '-' }}
                                </td>
                                <td>
                                    <button type="button" onclick="window.location.href = '{{ url('/home') }}';"
                                        class="btn btn-sm btn-warning" disabled>
                                        Delivered
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No orders found</td>
                            <tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            </div>
        </section>
    @endsection
