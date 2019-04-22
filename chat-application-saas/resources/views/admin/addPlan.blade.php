@extends('layouts.admin')

@section('title')
{{$page_title}}
@stop

@section('content')

 <div class="container-fluid">
  <div class="row">
    <div class="col-md-10">
      @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }}">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
          {{ Session::get('message') }}
          </div>
          </br>
        @endif
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Add New Paln</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">
          @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div><br />
          @endif
         {!! Form::open(array('url'=> 'admin/plans/add','id'=>'subscriptionPlan','class'=>'addPlan','files' => true)) !!}
               <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating" for="Plan Name *">Plan Name *</label>
                  {!! Form::text('name','', ['class'=>'form-control','id'=>'first_name']) !!}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                   <label class="bmd-label-floating" for="Price *">Price * (currency is $ by default)</label>
                   {!! Form::text('price','', ['class'=>'form-control number','id'=>'price']) !!}
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating" for="Trial Days *">Trial Days *</label>
                  {!! Form::number('trial_days','', ['class'=>'form-control number','id'=>'trial_days']) !!}
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-group">
                  <div class="row">
                  <label class="col-sm-2 col-form-label">Popular Plan *</label>
                  <div class="col-sm-8">
                    <div class="form-group bmd-form-group">
                      <div class="togglebutton">
                        <label>
                          <input type="checkbox" name="popular">
                          <span class="toggle"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>


           <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                  <label class="col-form-label label-checkbox">Choose Features *</label>
                </div>
              </div>

              <div class="col-sm-4 col-sm-offset-1 checkbox-radios">
                <div class="form-group">
                  @foreach($features as $feature)
                    <div class="form-check">
                     <label class="form-check-label">
                      <input class="form-check-input feature" value="{{$feature['_id']}}" name="feature[]" type="checkbox"> {{$feature['feature']}}
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                  </label>
                </div>
                  @endforeach
                </div>
              </div>

            </div>


            <button type="submit" class="btn btn-primary pull-right updateProfile">Save</button>
            <div class="clearfix"></div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

@section('moreJS')
{!! HTML::script('js/form_validations.js') !!}
{!! HTML::script('js/common.js') !!}
<script type="text/javascript">
  $('input[name="feature[]"]').change(function(){
            var atLeastOneIsChecked = $('input[name="feature[]"]:checked').length > 0;

            if (atLeastOneIsChecked) {
                $('input[name="feature[]"]').removeClass('error_border');
            } else {
                $('input[name="feature[]"]').addClass('error_border');
            }
  });
   onlyNumber('number');
</script>

@stop
