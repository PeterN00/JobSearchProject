<!DOCTYPE html>
<html>   
<head>
  @includeIf ('partials.head')
  <style>
    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto;
      grid-gap: 10px;
    }
    .grid-container-item{
     
    }
  </style>
  </head>
 <body class="w3-light-grey">

  <x-nav/>
  <!--slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      </ol>

      <div class="carousel-inner" id="slide-container">

        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('images/slider/slider01.jpg')}}"  alt="Recruitment slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>...</h5>
            <p>...</p>
          </div>      
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('images/slider/slider02.jpg')}}"  alt="Recruitment slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>...</h5>
            <p>...</p>
          </div>  
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('images/slider/slider03.jpg')}}"  alt="Recruitment slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>...</h5>
            <p>...</p>
          </div>  
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('images/slider/slider04.jpg')}}"  alt="Recruitment slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>...</h5>
            <p>...</p>
          </div>  
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('images/slider/slider05.jpg')}}"  alt="Recruitment slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>...</h5>
            <p>...</p>
          </div>  
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  
<div class="w3-margin w3-container w3-padding">
  <h3>Jobs:</h3>
  <div class="grid-container">
    @foreach($posts as $post)
    <a href="{{route('employee.job.show',['id'=>$post->id])}}">
    <div class="w3-container w3-border w3-round-large" style="padding:5px;background: #f9f9f9">
      <img src="{{ URL::asset("storage/{$post->logo}")}}" width="150px"alt="Avatar" class="w3-left w3-round-large w3-margin-right">
      
      <p style="font-size: 0.7em; padding-top:5px;" >
        <b style="font-size: 1em;">{{$post->company_name}}</b><br/>
        {{$post->position}}<br/>
        {{$post->salary}}
      </p>
    </div>
    </a>

    @endforeach
  </div>
  
</div>
    @includeIF('partials.footer')
    @includeIf ('partials.js')
    <script>
      $('.carousel').carousel({
          interval: 5000
      })
      document.addEventListener( 'DOMContentLoaded', function () {
	    new Splide( '#card-slider', {
        type : 'loop',
		    perPage    : 7,
		    breakpoints: {
			  '1024': {
				perPage: 6,
        fixedWidth: 200,
			  height    : 150,
			    }
		   }
	    } ).mount();
    } );
    </script>      
    </body>
</html>