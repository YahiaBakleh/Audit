<section class="section-hero-2 slider height-80" data-animation="slide" data-arrows="true" style="direction: initial">
    <ul class="slides">
        @foreach($slides as $slide)
        <li class="imagebg">
            <div class="background-image-holder">
                <img alt="image" src="{{ asset("storage/" . $slide->image_path) }}" />
            </div>
            <div class="container pos-vertical-center">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1 col-sm-7 slider">
                        {!!str_replace('pre','p',$slide->title)!!}

                        <!-- <a class="btn btn--white btn--unfilled" href="#">
                             <span class="btn__text">Purchase Partner Now</span>
                             <i class="ion-arrow-right-c"></i>
                         </a>
                         <a href="#" class="btn btn--white btn--transparent">
                                         <span class="btn__text">
                                             View Our Services
                                         </span>
                         </a>-->
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</section>