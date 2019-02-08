@extends('layouts.app')

@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
              
                <div class="pricing-table-wrap">
                    

                    <!-- Standard Pricing Table Start -->
                    <div class="container pd-0">
                         <a href="{!! route('home.create') !!}" class="btn btn-primary weight-500 right">Add Packag</a>
                        <h4 class="mb-30 text-light-blue weight-500">Standard Pricing Table</h4>
                        <div class="pricing-table-style2">
                            <div class="row no-gutters">
                                @foreach($users as $user)
                                <div class="col-md-4 col-sm-12">
                                    <div class="card mb-30">
                                        <div class="card-body text-center">
                                            <div class="icon"><img src="vendors/images/pricong-icon4.svg" alt=""></div>
                                            <h4 class="card-title weight-500 mb-20 text-blue">{!! $user->name !!}</h4>
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $user->midlle_name !!}</li>
                                            </ul>
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $user->last_name !!}</li>
                                            </ul>
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $user->email !!}</li>
                                            </ul>
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $user->city !!}</li>
                                            </ul>
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $user->state !!}</li>
                                            </ul>
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $user->country !!}</li>
                                            </ul>
                                            <ul class="list-group list-group-flush weight-500 mb-20">
                                                <li class="list-group-item">{!! $user->dob !!}</li>
                                            </ul>
                                           
                                           <a href="{!!route('home.edit',['id'=>$user->id])!!}" class="btn btn-primary ">Edit</a>
                                            <a href="{!!route('home.destroy',['id'=>$user->id])!!}"  data-confirm="Are you sure want to delete?" class="btn btn-danger ">Delete</a>
                                            <a href="{!!route('home.destroy',['id'=>$user->id])!!}"  data-confirm="Are you sure want to delete?" class="btn btn-danger ">Hobbies</a>
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
@section('sr')
<script type="text/javascript">
        jQuery(function(){
            jQuery("[data-confirm]").bind("click",function(e){        
                e.preventDefault();    
                var message = jQuery(this).data('confirm')? jQuery(this).data('confirm') : 'Are you sure?';    
                if(confirm(message))    
                    {        
                        var form = jQuery('<form />').attr('method','post').attr('action',jQuery(this).attr('href'));      
                        message != "Are you sure want to logout?" ? jQuery('<input />').attr('type','hidden').attr('name','_method').attr('value','delete').appendTo(form) : "";      
                        jQuery('<input />').attr('type','hidden').attr('name','_token').attr('value',jQuery('meta[name="_token"]').attr('content')).appendTo(form);      
                        jQuery('body').append(form);      
                        form.submit();    
                    }  
                });
        });
    </script>
    @endsection
