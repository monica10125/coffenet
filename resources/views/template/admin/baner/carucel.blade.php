<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
     @for($i=0 ; $i < count($baner) ;$i++)
        @if($i==0)
    <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="active"></li>
        @else
    <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}"></li>
        @endif
     @endfor
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
     @for($i=0 ; $i < count($baner) ;$i++)
        @if($i==0)
          <div class="item active">
            <center>
              <img src="{{ asset('/img/baner/'.$baner[$i]->foto) }}" class="img-baner" >
            </center>
          </div>
        @else
          <div class="item">
            <center>
            <img src="{{ asset('/img/baner/'.$baner[$i]->foto) }}" class="img-baner" >
            </center>
          </div>
        @endif
     @endfor
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>