<div class="form-body">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.title') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="title" value="{{ getData($data, 'title') }}" class="form-control" placeholder="{{ trans('main.title') }}" required>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    {{-- Add statistics's week --}}
    <div class="form-group{{ $errors->has('week_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.week') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="week_id" name="week_id">
              <option value="">{{ trans('main.select course') }}</option>
              @foreach ($we as $w)
                  <option value="{{ $w->id }}" {{ getData($data, 'week_id') == $w->id ? 'selected' : '' }}>{{ $w->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('week_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('week_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    {{-- Add statistics's Student --}}
    <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.student') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="student_id" name="student_id">
              <option value="">{{ trans('main.student') }}</option>
              @foreach ($st as $s)
                  <option value="{{ $s->id }}" {{ getData($data, 'student_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('student_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('student_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- Add Date Now -->
    <div class="form-group{{ $errors->has('datenow') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.datenow') }} <span class="required"></span> </label>
        <div class="col-md-8">
            <div class="input-group date date-picker" data-date-format="yyyy-mm-dd" >
                <input type="text" name="datenow" class="form-control" value="{{ getData($data, 'datenow') }}"  readonly required>
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
            @if ($errors->has('datenow'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('datenow') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label class="control-label col-md-2">{{ trans('main.image') }}</label>
        <div class="col-md-6">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    @if (checkValue(getData($data, 'image')))
                        <img src="{{ ShowImage(getData($data, 'image')) }}" alt="" />
                    @endif
                </div>
                <div>
                    <span class="btn red btn-outline btn-file">
                        <span class="fileinput-new"> {{ trans('main.select_image') }} </span>
                        <span class="fileinput-exists"> {{ trans('main.change') }} </span>
                        <input type="file" name="image">
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('main.remove') }} </a>
                </div>
            </div>
            @if ($errors->has('image'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.status') }} <span class="required"></span> </label>
        <div class="col-md-6">
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

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.notes') }} </label>
        <div class="col-md-10">
            <textarea name="content" class="form-control" placeholder="{{ trans('main.notes') }}">{{ getData($data, 'content') }}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- الكرازة -->
    <div class="form-group{{ $errors->has('allnet') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.allnet') }}  </label>
        <div class="col-md-6">
            <input type="number" name="allnet"  value="{{ getData($data, 'allnet') }}" class="form-control" placeholder="{{ trans('main.allnet') }}" >
            @if ($errors->has('allnet'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('allnet') }}</strong>
                </span>
            @endif
        </div>
    </div>
<!-- القرار -->
    <div class="form-group{{ $errors->has('course1') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.course1') }}  </label>
        <div class="col-md-6">
            <input type="number" name="course1"  value="{{ getData($data, 'course1') }}" class="form-control" placeholder="{{ trans('main.course1') }}" >
            @if ($errors->has('course1'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('course1') }}</strong>
                </span>
            @endif
        </div>
    </div>
<!-- متابعة اولى -->
    <div class="form-group{{ $errors->has('course2') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.course2') }}  </label>
        <div class="col-md-6">
            <input type="number" name="course2"  value="{{ getData($data, 'course2') }}" class="form-control" placeholder="{{ trans('main.observation1') }}" >
            @if ($errors->has('course2'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('course2') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة ثانية -->
    <div class="form-group{{ $errors->has('course3') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.course3') }} </label>
        <div class="col-md-6">
            <input type="number" name="course3"  value="{{ getData($data, 'course3') }}" class="form-control" placeholder="{{ trans('main.observation2') }}" >
            @if ($errors->has('course3'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('course3') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة ثالثة -->
    <div class="form-group{{ $errors->has('course4') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.course4') }} </label>
        <div class="col-md-6">
            <input type="number" name="course4"  value="{{ getData($data, 'course4') }}" class="form-control" placeholder="{{ trans('main.observation3') }}" >
            @if ($errors->has('course4'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('course4') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة رابعة -->
    <div class="form-group{{ $errors->has('TT') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.TT') }}  </label>
        <div class="col-md-6">
            <input type="number" name="TT"  value="{{ getData($data, 'TT') }}" class="form-control" placeholder="{{ trans('main.observation4') }}" >
            @if ($errors->has('TT'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('TT') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة خامسة -->
    <div class="form-group{{ $errors->has('friends') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.friends') }} </label>
        <div class="col-md-6">
            <input type="number" name="friends"  value="{{ getData($data, 'friends') }}" class="form-control" placeholder="{{ trans('main.observation5') }}" >
            @if ($errors->has('friends'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('friends') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>
