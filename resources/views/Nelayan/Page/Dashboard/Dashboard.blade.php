@extends('Nelayan.Master')

@section('content')
            
                <div class="row">
                    <!-- Order Statistics -->
                    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Produk Statistik</h5>
                        </div>
                        <div class="dropdown">
                            <button
                            class="btn p-0"
                            type="button"
                            id="orederStatistics"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">{{$produk}}</h2>
                            <span>Total Produk </span>
                            </div>
                            <div id="orderStatisticsChart"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('fish.png') }}" alt="foto" class="img-fluid">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                <h6 class="mb-0">Ikan Air Laut</h6>
                                </div>
                                <div class="user-progress">
                                <small class="fw-semibold">{{$laut}}</small>
                                </div>
                            </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('tawar.png') }}" alt="foto" class="img-fluid">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                <h6 class="mb-0">Ikan Air Tawar</h6>
                                </div>
                                <div class="user-progress">
                                <small class="fw-semibold">{{$tawar}}</small>
                                </div>
                            </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('olahan.png') }}" alt="foto" class="img-fluid">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                <h6 class="mb-0">Olahan Ikan</h6>
                                </div>
                                <div class="user-progress">
                                <small class="fw-semibold">{{$olahan}}</small>
                                </div>
                            </div>
                            </li>
                            
                        </ul>
                        </div>
                    </div>
                    </div>
                    <!--/ Order Statistics -->

                    <!-- Transactions -->
                    <div class="col-md-6 col-lg-8 order-2 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">History Transaksi</h5>
                        <div class="dropdown">
                            <button
                            class="btn p-0"
                            type="button"
                            id="transactionID"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                        </div>
                        </div>
                        <div class="card-body">
                        <ul class="p-0 m-0">
                        @foreach($trans->take(6) as $pr)
                            <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset('datauser/' . $pr->user->foto) }}" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                <h6 class="mb-1">{{$pr->user->name}}</h6>
                                <small class="text-muted d-block ">{{$pr->no_order}}</small>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">@currency($pr->total)</h6>
                                </div>
                            </div>
                            </li>
                        @endforeach
                        </ul>
                        </div>
                    </div>
                    </div>
                    <!--/ Transactions -->
                </div>
@endsection