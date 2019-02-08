@extends('layouts.app')

@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
              
                <div class="pricing-table-wrap">
                    

                    <!-- Standard Pricing Table Start -->
                    <div class="container pd-0">
                         <a href="{!! route('packages.create') !!}" class="btn btn-primary weight-500 right">Add Packag</a>
                        <h4 class="mb-30 text-light-blue weight-500">Standard Pricing Table</h4>
                        <div class="pricing-table-style2">
                            <div class="row no-gutters">
                                @foreach($packages as $package)
                                <div class="col-md-4 col-sm-12">
                                    <div class="card mb-30">
                                        <div class="card-body text-center">
                                            <div class="icon"><img src="vendors/images/pricong-icon4.svg" alt=""></div>
                                            <h4 class="card-title weight-500 mb-20 text-blue">{!! $package->packagecategory->name !!}</h4>
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $package->description !!}</li>
                                            </ul>
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $package->price !!}</li>
                                            </ul>
                                            @foreach($package->packagesfeature as $feature)
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $feature->name !!}</li>
                                            </ul>
                                            @endforeach
                                           <a href="{!!route('packages.edit',['id'=>$package->id])!!}" class="btn btn-primary ">Buy Now</a>
                                           {{--  <a href="{!!route('packages.destroy',['id'=>$package->id])!!}"  data-confirm="Are you sure want to delete?" class="btn btn-danger ">Delete</a> --}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Standard Pricing Table End -->
                </div>
            </div>
        </div>
    </div>
@endsection
