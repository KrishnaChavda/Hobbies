@extends('layouts.app')

@section('content')

  <div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">@lang('words.add_course_categories')</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
               {{--  <a href="{!! route('course_categories.index') !!}" class="btn btn-sm btn-primary btn-sm"  data-toggle="tooltip" title="Back to Course Categories!" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> @lang('words.back')</a> --}}
            </div>
        </div>

         {!! Former::open()->method('PATCH')->action(route('home.update',$user->id)) !!}
                        

        {!! Former::text('name')->placeholder('User Name')->label('User Name') !!}
        
        {!! Former::text('name')->placeholder('User Name')->label('User Name') !!}
           
             <div class="col-lg-10 col-sm-8">
                <input type="checkbox" name="user_hobbies[]" value="Dance" {!! in_array('Dance', $hobby) ? 'checked' : '' !!}>    
                Dance
            </div>
            <div class="col-lg-10 col-sm-8">
                <input type="checkbox" name="user_hobbies[]" value="Reading"{!! in_array('Reading', $hobby) ? 'checked' : '' !!}>
                Reading
            </div>  

             <div class="col-lg-10 col-sm-8">
                <label>Status</label>
                 <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1"{!!  $package->status == 1 ? 'checked' : ''  !!} >
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
