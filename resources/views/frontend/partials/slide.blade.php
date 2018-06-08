<div id="slide">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox" id="slide1">
            <?php
                $slide = DB::table('slides')->where('status', 1)->where('dislay', 1)->get();
            ?>
            @foreach($slide as $c)
            <div class="item">
                <img src="{{ asset($c->image) }}" alt="imgSlide" title="" id="wows1_0"
                class="img-responsive img100 " style="width:100%;" />
            </div>
            @endforeach
        </div>
        <li class="left carousel-control" data-target="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </li>
        <li class="right carousel-control" data-target="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </li>
    </div>
</div>