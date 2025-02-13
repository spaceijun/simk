@extends('templates.header')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Pemasukan</p>
                        </div>
                        {{-- <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                            </h5>
                        </div> --}}
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">Rp. <span class="counter-value"
                                    data-target="{{ $jmlPemasukan }}">0</span></h4>
                            <a href="#" class="text-decoration-underline">Detail Pemasukan</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                <i class="bx bx-dollar-circle text-success"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Pengeluaran</p>
                        </div>
                        {{-- <div class="flex-shrink-0">
                            <h5 class="text-danger fs-14 mb-0">
                                <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                            </h5>
                        </div> --}}
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">Rp. <span class="counter-value"
                                    data-target="{{ $jmlPengeluaran }}">0</span></h4>
                            <a href="{{ route('transaksi.index') }}" class="text-decoration-underline">Detail
                                Pengeluaran</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                <i class="bx bx-shopping-bag text-info"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Hutang</p>
                        </div>
                        {{-- <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                            </h5>
                        </div> --}}
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">Rp. <span class="counter-value"
                                    data-target="{{ $jmlHutang }}">0</span> </h4>
                            <a href="#" class="text-decoration-underline">Detail Hutang</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                <i class="bx bx-user-circle text-warning"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Piutang</p>
                        </div>
                        {{-- <div class="flex-shrink-0">
                            <h5 class="text-muted fs-14 mb-0">
                                +0.00 %
                            </h5>
                        </div> --}}
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">Rp <span class="counter-value"
                                    data-target="{{ $jmlPiutang }}">0</span> </h4>
                            <a href="#" class="text-decoration-underline">Detail Piutang</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                <i class="bx bx-wallet text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div> <!-- end row-->

    <div class="row">
        {{-- Card Transaksi --}}
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Perbandingan Transaksi</h4>
                </div>
                <div class="card-body">
                    <div id="transaksi_chart" class="apex-charts"></div>
                    <div class="table-responsive mt-3">
                        <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                            <tbody class="border-0">
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0">
                                            <i class="ri-stop-fill align-middle fs-18 text-danger me-2"></i>Total
                                            Pengeluaran
                                        </h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0">Rp. {{ number_format($jmlPengeluaran, 0, ',', '.') }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0">
                                            <i class="ri-stop-fill align-middle fs-18 text-success me-2"></i>Total
                                            Pemasukan
                                        </h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0">Rp. {{ number_format($jmlPemasukan, 0, ',', '.') }}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Hutang Piutang --}}
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Perbandingan Hutang & Piutang</h4>
                </div>
                <div class="card-body">
                    <div id="hutang_chart" class="apex-charts"></div>
                    <div class="table-responsive mt-3">
                        <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                            <tbody class="border-0">
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0">
                                            <i class="ri-stop-fill align-middle fs-18 text-danger me-2"></i>Total Hutang
                                        </h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0">Rp. {{ number_format($jmlHutang, 0, ',', '.') }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0">
                                            <i class="ri-stop-fill align-middle fs-18 text-success me-2"></i>Total
                                            Piutang
                                        </h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0">Rp. {{ number_format($jmlPiutang, 0, ',', '.') }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Calendar --}}
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Kalender</h4>
                </div>
                <div class="card-body">
                    <div id="calendar">
                        <input type="text" id="calendar-input" class="form-control text-center bg-light border-0"
                            readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Chart Perbandingan Transaksi -->
    <script>
        var transaksiOptions = {
            chart: {
                type: 'pie',
                height: 300
            },
            labels: ['Pengeluaran', 'Pemasukan'],
            series: [{{ $jmlPengeluaran }}, {{ $jmlPemasukan }}],
            colors: ['#ff0202', '#34c38f'],
            legend: {
                position: 'bottom'
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return 'Rp. ' + new Intl.NumberFormat('id-ID').format(value);
                    }
                }
            }
        };

        var transaksiChart = new ApexCharts(document.querySelector("#transaksi_chart"), transaksiOptions);
        transaksiChart.render();
    </script>

    <script>
        var hutangOptions = {
            chart: {
                type: 'pie',
                height: 300
            },
            labels: ['Total Hutang', 'Total Piutang'],
            series: [{{ $jmlHutang }}, {{ $jmlPiutang }}],
            colors: ['#ff0202', '#34c38f'],
            legend: {
                position: 'bottom'
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return 'Rp. ' + new Intl.NumberFormat('id-ID').format(value);
                    }
                }
            }
        };

        var hutangChart = new ApexCharts(document.querySelector("#hutang_chart"), hutangOptions);
        hutangChart.render();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#calendar-input", {
                inline: true,
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
            });
        });
    </script>
@endsection
