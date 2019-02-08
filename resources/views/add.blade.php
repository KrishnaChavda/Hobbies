@extends('layouts.app')

@section('content')

  <div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue"></h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
               {{--  <a href="{!! route('course_categories.index') !!}" class="btn btn-sm btn-primary btn-sm"  data-toggle="tooltip" title="Back to Course Categories!" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> @lang('words.back')</a> --}}
            </div>
        </div>

        {!! Former::horizontal_open()->action(URL::route("home.store"))->method('POST')->class('p-t-15')->role('form')->id('form') !!} 
        {!! csrf_field() !!}


         {{-- {!! Former::select('package_category_id')->label('Package Category')->options($package_categories)->placeholder('Select any one Package Category') !!} --}}                          

        {!! Former::text('name')->placeholder('User Name')->label('User Name') !!}
        
        {!! Former::text('middle_name')->placeholder('Middle Name')->label('Middle Name') !!}

        {!! Former::text('last_name')->placeholder('Last Name')->label('Last Name') !!}

        {!! Former::text('email')->placeholder('Email')->label('Email') !!}

        {!! Former::text('city')->placeholder('City')->label('City') !!}

        {!! Former::text('state')->placeholder('Status')->label('Status') !!}

        {!! Former::text('country')->placeholder('Country')->label('Country') !!}

        {!! Former::text('dob')->placeholder('Date of Birth')->label('Date of Birth') !!}
        
        <div class="col-lg-10 col-sm-8">
                <input type="checkbox" name="user_hobbies[]" value="Dance">    
                Dance
            </div>
            <div class="col-lg-10 col-sm-8">
                <input type="checkbox" name="user_hobbies[]" value="Reading">
                Reading
            </div>        
         <div class="col-lg-10 col-sm-8">
                <label>Status</label>
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1">
            </div>
        
     <div class="form-group">
    <div class="col-lg-10 col-sm-8">
        {!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
    </div>
</div>
        {!! Former::close() !!}
    </div>
</div>
@endsection
