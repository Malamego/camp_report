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

        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.slug') }} <span class="required"></span> </label>
            <div class="col-md-6">
                <input type="text" name="slug" value="{{ getData($data, 'slug') }}" class="form-control" placeholder="{{ trans('main.slug') }}" >
                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.description') }} <span class="required"></span> </label>
            <div class="col-md-6">
                <input type="text" name="desc" value="{{ getData($data, 'desc') }}" class="form-control" placeholder="{{ trans('main.description') }}" >
                @if ($errors->has('desc'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('desc') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('need') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.need') }} <span class="required"></span> </label>
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
