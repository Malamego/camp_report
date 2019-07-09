<div class="form-body">
    <!-- Add week_details's week -->
    <div class="form-group{{ $errors->has('week_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.week') }} <span class="required"></span> </label>
        <div class="col-md-8">
            <select class="form-control select2" id="week_id" name="week_id">
                <option value="">{{ trans('main.select week') }}</option>
                @foreach ($we as $c)
                    <option value="{{ $c->id }}" {{ getData($data, 'week_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('week_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('week_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Add week_details's Class -->
    <div class="form-group{{ $errors->has('class_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.class') }} <span class="required"></span> </label>
        <div class="col-md-8">
            <select class="form-control select2" id="class_id" name="class_id">
                <option value="">{{ trans('main.select class') }}</option>
                @foreach ($cls as $c)
                    <option value="{{ $c->id }}" {{ getData($data, 'class_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('class_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('class_id') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.status') }} <span class="required"></span> </label>
        <div class="col-md-8">
            <select class="form-control select2" id="status" name="status">
                <option value="">{{ trans('main.status') }}</option>
                <option value="active" {{ getData($data, 'status') == 'active' ? ' selected' : '' }}>{{trans('main.active')}}</option>
                <option value="inactive" {{ getData($data, 'status') == 'inactive' ? ' selected' : '' }}>{{trans('main.inactive')}}</option>
            </select>
            @if ($errors->has('status'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('startdate') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.start_date') }} <span class="required"></span> </label>
        <div class="col-md-8">
            <div class="input-group date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                <input type="text" name="startdate" class="form-control" value="{{ getData($data, 'startdate') }}" readonly required>
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
            @if ($errors->has('startdate'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('startdate') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Enter ENd Date.. -->
    <div class="form-group{{ $errors->has('enddate') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.end_date') }} <span class="required"></span> </label>
        <div class="col-md-8">
            <div class="input-group date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                <input type="text" name="enddate" class="form-control" value="{{ getData($data, 'enddate') }}" readonly required>
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
            @if ($errors->has('enddate'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('enddate') }}</strong>
                </span>
            @endif
        </div>
    </div>


</div>
