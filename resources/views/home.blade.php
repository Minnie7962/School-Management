@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-3">
                <div class="col ps-4">
                    <!-- <h1 class="display-6 mb-3"><i class="ms-auto bi bi-grid"></i> {{ __('Dashboard') }}</h1> -->
                    <div class="row dashboard">
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Total Students</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{$studentCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-person-lines-fill me-3"></i> Total Teachers</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{$teacherCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><i class="bi bi-diagram-3 me-3"></i> Total Classes</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">{{ $classCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col">
                            <div class="card rounded-pill">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Total Books</div>
                                        </div>
                                        <span class="badge bg-dark rounded-pill">800</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    @if($studentCount > 0)
                    <div class="mt-3 d-flex align-items-center">
                        <div class="col-3">
                            <span class="ps-2 me-2">Students %</span>
                            <span class="badge rounded-pill border" style="background-color: #0678c8;">Male</span>
                            <span class="badge rounded-pill border" style="background-color: #49a4fe;">Female</span>
                        </div>
                        @php
                        $maleStudentPercentage = round(($maleStudentsBySession/$studentCount), 2) * 100;
                        $maleStudentPercentageStyle = "style='background-color: #0678c8; width: $maleStudentPercentage%'";

                        $femaleStudentPercentage = round((($studentCount - $maleStudentsBySession)/$studentCount), 2) * 100;
                        $femaleStudentPercentageStyle = "style='background-color: #49a4fe; width: $femaleStudentPercentage%'";
                        @endphp
                        <div class="col-9 progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" {!!$maleStudentPercentageStyle!!} aria-valuenow="{{$maleStudentPercentage}}" aria-valuemin="0" aria-valuemax="100">{{$maleStudentPercentage}}%</div>
                            <div class="progress-bar progress-bar-striped" role="progressbar" {!!$femaleStudentPercentageStyle!!} aria-valuenow="{{$femaleStudentPercentage}}" aria-valuemin="0" aria-valuemax="100">{{$femaleStudentPercentage}}%</div>
                          </div>
                    </div>
                    @endif
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
