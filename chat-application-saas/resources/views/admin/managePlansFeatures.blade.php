@extends('layouts.admin')

@section('title')
{{$page_title}}
@stop

@section('moreHead')
@stop
@section('content')

 <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
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
                  <h4 class="card-title col-md-9 pull-left">All Features</h4>
                  <p class="card-category col-md-9"></p>
                  <a class=" col-md-2 btn btn-success btn-gradient featureAdd pull-right" href="#addFeature" data-toggle="modal" data-target="#addFeature" title="Add Feature"><i class="fa fa-plus"></i>  Add Feature</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">

                    <table class="table" id="featureTable">
                      <thead class=" text-primary">
                        <th>
                          Name
                        </th>
                        <th width="300">
                          Action
                        </th>
                      </thead>
                      <tbody class="row_position">

                          @forelse($features as $key => $data)
                          @php
                            $featureID = (array) $data['_id']
                          @endphp
                          <tr id="row{{$featureID['oid']}}" title="Change Order">
                           <td>
                              {{$data['feature']}}
                            </td>
                            <td>
                              <div data-toggle="buttons-radio" class="btn-group">

                                <a class="btn btn-success btn-gradient reload featureEdit" href="#addFeature" data-toggle="modal" data-target="#addFeature" title="Edit" id="{{$featureID['oid']}}"><i class="fa fa-pencil"></i> </a>
                                <a class="btn btn-danger btn-gradient featureDelete" href="#deleteFeature" data-toggle="modal" data-target="#deleteFeature" id="{{$featureID['oid']}}" title="Delete"><i class="fa fa-remove"></i></a>
                              </div>
                            </td>
                          </tr>
                         @empty
                            <tr>
                             <td rowspan="5">
                                No record found!
                              </td>
                            </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- --------------------Model ------------>



             <div class="modal fade" id="deleteFeature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><i class="material-icons">clear</i></button>
                    </div>
                    <div class="modal-body">
                      <h5 id="myModalLabel" class="semi-bold">Are you sure that you want to delete "<b class="blogname"></b>" feature?</h5>
                    </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-link" data-dismiss="modal">Never mind</button>
                      <button type="button" class="btn btn-success btn-link deleteFeature" id="">Yes
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                  </div>


                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>


                <div class="modal fade" id="addFeature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 id="featureTitle"></h4>
                      <button type="button" class="close" data-dismiss="modal"><i class="material-icons">clear</i></button>
                    </div>
                    <div class="modal-body">
                            <div class="alert alert-danger validation" style="display: none;">
                              <button type="button" class="close closeValidation">
                              <i class="material-icons">close</i>
                              </button>
                              <div id="validation"></div>
                          </div>
                      <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                Name *
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <input name="feature" id="featuretext" type="text" class="form-control">
                              </div>
                            </div>

                    </div>
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-success btn-link addFeature" id="">Save
                        <div class="ripple-container"></div>
                      </button>
                       <button type="button" class="btn btn-success btn-link editFeature" id="">Save
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                  </div>


                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
            <!-- --------------------Model end------------>
            </div>
  </div>
</div>



@endsection

@section('moreJS')
{!! HTML::script('js/jquery-ui.min.js') !!}

<script type="text/javascript">

  ////////////////// change order

  $( ".row_position" ).sortable({

      delay: 150,

      stop: function() {

          var selectedData = new Array();

          $('.row_position>tr').each(function() {

              selectedData.push($(this).attr("id"));

          });

          updateOrder(selectedData);

      }

  });


  function updateOrder(data) {
    var token= '{{ csrf_token() }}';
    $.post('{{ URL :: to('admin/feature/ordering')}}',{order:data,_token:token},function(data){});

  }

  //////////////////// Delete feature

  $(document).on('click','.featureDelete',function(){
    var catname= $(this).parents('tr').children('td:nth-child(1)').text();
    var id= $(this).attr('id');
    $('.blogname').text(catname);
    $('.deleteFeature').attr('id',id);
  });

  $('.deleteFeature').click(function(){
    var id= $(this).attr('id');
    var token= '{{ csrf_token() }}';

        $.post('{{ URL :: to('admin/feature/delete')}}',{id:id,_token:token},function(data){
          $('#deleteFeature').modal('toggle');
          $('#row'+id).addClass('row_selected');

          setTimeout(function(){
            $('#row'+id).removeClass('row_selected');
            $('#row'+id).remove();
          },2000);
        });
  });

//////////////////Edit Feature

  $(document).on('click','.featureEdit',function(){
    var id = $(this).attr('id');
    $('.editFeature').attr('id',id);
    $('.editFeature').show();
    $('.addFeature').hide();
    $('.validation').hide();
    $('#featureTitle').html('Edit Feature');
    var featureText = $('#row'+id).children('td:nth-child(1)').html().trim();
    $('#featuretext').val(featureText);
  });

  $('.closeValidation').click(function(){ $('.validation').hide(); });

  $('.editFeature').click(function(){
    var id= $(this).attr('id');
    var token= '{{ csrf_token() }}';
    var feature = $('#featuretext').val();

        $.post('{{ URL :: to('admin/feature/edit')}}',{id:id,_token:token,feature:feature},function(data){
          if(data == 'sucess'){
            $('#addFeature').modal('toggle');
            $('#row'+id).addClass('alert alert-primary');

            setTimeout(function(){
              $('#row'+id).children('td:nth-child(1)').text(feature);
              $('#row'+id).removeClass('alert alert-primary');
            },2000);

          }else{
            $('.validation').show();
            $('#validation').html(data.feature);
          }

        });
  });

////////////////////// Add Feature
  $(document).on('click','.featureAdd',function(){
    $('.validation').hide();
    $('#featureTitle').html('Add New Feature');
    $('.editFeature').hide();
    $('.addFeature').show();
    $('#featuretext').val('');
  });

  $('.addFeature').click(function(){
    var id= $(this).attr('id');
    var token= '{{ csrf_token() }}';
    var feature = $('#featuretext').val();

        $.post('{{ URL :: to('admin/feature/add')}}',{id:id,_token:token,feature:feature},function(data){
          if(data.status == 'sucess'){
            var featureId = data.featureId;
            $('#addFeature').modal('toggle');
            $('table#featureTable').append('<tr id="row'+featureId+'"><td>'+feature+'</td><td><div data-toggle="buttons-radio" class="btn-group"><a class="btn btn-success btn-gradient reload featureEdit" href="#addFeature" data-toggle="modal" data-target="#addFeature" title="Edit" id="'+featureId+'"><i class="fa fa-pencil"></i> </a><a class="btn btn-danger btn-gradient featureDelete" href="#deleteFeature" data-toggle="modal" data-target="#deleteFeature" id="'+featureId+'" title="Delete"><i class="fa fa-remove"></i></a></div></td></tr>');

          }else{
            $('.validation').show();
            $('#validation').html(data.feature);
          }

        });
  });

</script>

@stop
