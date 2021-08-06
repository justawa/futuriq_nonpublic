@extends('layouts.dashboard')

@section('style')
<style>
  #lightbox .modal-content {
    display: inline-block;
    text-align: center;   
  }

  #lightbox .close {
    opacity: 1;
    color: rgb(255, 255, 255);
    background-color: rgb(25, 25, 25);
    padding: 5px 8px;
    border-radius: 30px;
    border: 2px solid rgb(255, 255, 255);
    position: absolute;
    top: -15px;
    right: -55px;
    z-index:1032;
  }
</style>
@endsection

@section('page-heading', 'List')

@section('content')
<div class="container">
  @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
  @endif
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ASP Id</th>
        <th scope="col">Name</th>
        <th scope="col">Pan</th>
        <th scope="col">Mobile</th>
        <th scope="col">Photo File</th>
        <th scope="col">Pan File</th>
        <th scope="col">Address File</th>
        <th scope="col">Video File</th>
      </tr>
    </thead>
    <tbody>
      @if($enrolments->count() > 0)
        @foreach($enrolments as $enrolment)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $enrolment->application_id }}</td>
          <td>{{ $enrolment->name }}</td>
          <td>{{ $enrolment->pan }}</td>
          <td>{{ $enrolment->mobile }}</td>
          <td>
            <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
              <img class="img-fluid" src="{{ asset('storage/'.$enrolment->photo_file) }}"/>
            </a>
          </td>
          <td>
            <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
              <img class="img-fluid" src="{{ asset('storage/'.$enrolment->pan_file) }}"/>
            </a>
          </td>
          <td>
            <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
              <img class="img-fluid" src="{{ asset('storage/'.$enrolment->address_file) }}"/>
            </a>
          </td>
          <td>NA</td>
        </tr>
        @endforeach
      @else
        <tr><td colspan="8">No Enrolments</td></tr>
      @endif
    </tbody>
  </table>
</div>

<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-content">
            <div class="modal-body">
                <img class="img-fluid" src="" alt="" />
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script> 
$(document).ready(function() {
    var lightbox = $('#lightbox');
    
    $('[data-target="#lightbox"]').on('click', function(event) {
        var img = $(this).find('img'), 
            src = img.attr('src'),
            alt = img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };
    
        lightbox.find('.close').addClass('hidden');
        lightbox.find('img').attr('src', src);
        lightbox.find('img').attr('alt', alt);
        // lightbox.find('img').css(css);
    });

    console.log("hello");
    
    lightbox.on('shown.bs.modal', function (e) {
        var img = lightbox.find('img');
            
        lightbox.find('.modal-dialog').css({'width': img.width()});
        lightbox.find('.close').removeClass('hidden');
    });
});
</script>
@endsection



            
          
          