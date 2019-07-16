<div class="form-body">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.name') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="name" value="{{ getData($data, 'name') }}" class="form-control" placeholder="{{ trans('main.name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- رقم الاسبوع -->
       <div class="form-group{{ $errors->has('week_num') ? ' has-error' : '' }}">
           <label class="col-md-2 control-label">{{ trans('main.week_num') }} <span class="required"></span> </label>
           <div class="col-md-6">
               <input type="number" name="week_num"  value="{{ getData($data, 'week_num') }}" class="form-control" placeholder="{{ trans('main.week_num') }}" required>
               @if ($errors->has('week_num'))
                   <span class="help-block">
                       <strong class="help-block">{{ $errors->first('week_num') }}</strong>
                   </span>
               @endif
           </div>
       </div>

        <div class="form-group{{ $errors->has('need') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.need') }}  </label>
            <div class="col-md-6">
                <input type="text" name="need" value="{{ getData($data, 'need') }}" class="form-control" placeholder="{{ trans('main.need') }}" >
                @if ($errors->has('need'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('need') }}</strong>
                    </span>
                @endif
            </div>
        </div>


</div>
