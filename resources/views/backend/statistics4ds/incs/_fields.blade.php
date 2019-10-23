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
              <option value="">{{ trans('main.select week') }}</option>
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

    {{-- Add statistics's TOOL --}}
    <div class="form-group{{ $errors->has('week_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.tool') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="tool_id" name="tool_id">
              <option value="">{{ trans('main.select tool') }}</option>
              @foreach ($tool as $t)
                  <option value="{{ $t->id }}" {{ getData($data, 'tool_id') == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('tool_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('tool_id') }}</strong>
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

    <div class="form-group{{ $errors->has('story') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.story') }} </label>
        <div class="col-md-10">
            <textarea name="story" class="form-control" placeholder="{{ trans('main.notes') }}">{{ getData($data, 'story') }}</textarea>
            @if ($errors->has('story'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('story') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- التواصل -->
        <div class="form-group{{ $errors->has('interact') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.interact') }}  </label>
            <div class="col-md-6">
                <input type="number" name="interact"  value="{{ getData($data, 'interact') }}" class="form-control" placeholder="{{ trans('main.interact') }}" >
                @if ($errors->has('interact'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('interact') }}</strong>
                    </span>
                @endif
            </div>
        </div>

 <!-- الكرازة -->
    <div class="form-group{{ $errors->has('mission') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.mission') }}  </label>
        <div class="col-md-6">
            <input type="number" name="mission"  value="{{ getData($data, 'mission') }}" class="form-control" placeholder="{{ trans('main.mission') }}" >
            @if ($errors->has('mission'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('mission') }}</strong>
                </span>
            @endif
        </div>
    </div>
<!-- القرار -->
    <div class="form-group{{ $errors->has('decision') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.decision') }}  </label>
        <div class="col-md-6">
            <input type="number" name="decision"  value="{{ getData($data, 'decision') }}" class="form-control" placeholder="{{ trans('main.decision') }}" >
            @if ($errors->has('decision'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('decision') }}</strong>
                </span>
            @endif
        </div>
    </div>

<!-- متابعة اولى -->
    <div class="form-group{{ $errors->has('ob1') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation1') }}  </label>
        <div class="col-md-6">
            <input type="number" name="ob1"  value="{{ getData($data, 'ob1') }}" class="form-control" placeholder="{{ trans('main.observation1') }}" >
            @if ($errors->has('ob1'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob1') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة ثانية -->
    <div class="form-group{{ $errors->has('ob2') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation2') }} </label>
        <div class="col-md-6">
            <input type="number" name="ob2"  value="{{ getData($data, 'ob2') }}" class="form-control" placeholder="{{ trans('main.observation2') }}" >
            @if ($errors->has('ob2'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob2') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة ثالثة -->
    <div class="form-group{{ $errors->has('ob3') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation3') }} </label>
        <div class="col-md-6">
            <input type="number" name="ob3"  value="{{ getData($data, 'ob3') }}" class="form-control" placeholder="{{ trans('main.observation3') }}" >
            @if ($errors->has('ob3'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob3') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة رابعة -->
    <div class="form-group{{ $errors->has('ob4') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation4') }}  </label>
        <div class="col-md-6">
            <input type="number" name="ob4"  value="{{ getData($data, 'ob4') }}" class="form-control" placeholder="{{ trans('main.observation4') }}" >
            @if ($errors->has('ob4'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob4') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة خامسة -->
    <div class="form-group{{ $errors->has('ob5') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation5') }} </label>
        <div class="col-md-6">
            <input type="number" name="ob5"  value="{{ getData($data, 'ob5') }}" class="form-control" placeholder="{{ trans('main.observation5') }}" >
            @if ($errors->has('ob5'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob5') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة سادسة -->
    <div class="form-group{{ $errors->has('ob6') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation6') }}  </label>
        <div class="col-md-6">
            <input type="number" name="ob6"  value="{{ getData($data, 'ob6') }}" class="form-control" placeholder="{{ trans('main.observation6') }}" >
            @if ($errors->has('ob6'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob6') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!--  مستوى اول -->
             <div class="form-group{{ $errors->has('level1') ? ' has-error' : '' }}">
                 <label class="col-md-2 control-label">{{ trans('main.level1') }}  </label>
                 <div class="col-md-6">
                     <input type="number" name="level1"  value="{{ getData($data, 'level1') }}" class="form-control" placeholder="{{ trans('main.level1') }}" >
                     @if ($errors->has('level1'))
                         <span class="help-block">
                             <strong class="help-block">{{ $errors->first('level1') }}</strong>
                         </span>
                     @endif
                 </div>
             </div>

             <!-- مستوى ثان -->
                <div class="form-group{{ $errors->has('level2') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">{{ trans('main.level2') }}  </label>
                    <div class="col-md-6">
                        <input type="number" name="level2"  value="{{ getData($data, 'level2') }}" class="form-control" placeholder="{{ trans('main.level2') }}" >
                        @if ($errors->has('level2'))
                            <span class="help-block">
                                <strong class="help-block">{{ $errors->first('level2') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- مستوى ثالث -->
                   <div class="form-group{{ $errors->has('level3') ? ' has-error' : '' }}">
                       <label class="col-md-2 control-label">{{ trans('main.level3') }}  </label>
                       <div class="col-md-6">
                           <input type="number" name="level3"  value="{{ getData($data, 'level3') }}" class="form-control" placeholder="{{ trans('main.level3') }}" >
                           @if ($errors->has('level3'))
                               <span class="help-block">
                                   <strong class="help-block">{{ $errors->first('level3') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <!--   مستوى رابع -->
                      <div class="form-group{{ $errors->has('level4') ? ' has-error' : '' }}">
                          <label class="col-md-2 control-label">{{ trans('main.level4') }}  </label>
                          <div class="col-md-6">
                              <input type="number" name="level4"  value="{{ getData($data, 'level4') }}" class="form-control" placeholder="{{ trans('main.level4') }}" >
                              @if ($errors->has('level4'))
                                  <span class="help-block">
                                      <strong class="help-block">{{ $errors->first('level4') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

    <div class="form-group{{ $errors->has('tot') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.tot') }}  </label>
        <div class="col-md-6">
            <input type="number" name="tot"  value="{{ getData($data, 'tot') }}" class="form-control" placeholder="{{ trans('main.tot') }}" >
            @if ($errors->has('tot'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('tot') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('pool') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.pool') }}  </label>
        <div class="col-md-6">
            <input type="number" name="pool"  value="{{ getData($data, 'pool') }}" class="form-control" placeholder="{{ trans('main.pool') }}" >
            @if ($errors->has('pool'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('pool') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>
