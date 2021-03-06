@extends('layouts.landing')

@section('content')
 <!-- Preloader -->
 <div class="wed_page_loader">
     <div class="wed_story_content wed_image_bck" data-color="#e4d4fb">
      <div class="wed_heart_container_row_4">
        <img class="wed_fourth_heart_1" src="images/small_people/heart_1.png" alt="">
        <img class="wed_fourth_heart_2" src="images/small_people/heart_2.png" alt="">
        <img class="wed_fourth_heart_3" src="images/small_people/heart_3.png" alt="">
      </div>
      <div class="wed_story_small_img">
        <img src="images/small_people/small_couple.png" alt="">
      </div>

    </div>
  </div>
  <!-- Preloader End-->

  <!-- Floral Animation -->
  <div id="leafContainer" data-image="floral"></div>
  <!-- Floral Animaton End -->



  <!-- Page -->
  <div class="wed_page" id="wed_page">

    <!-- Header -->
    <header>       
      <nav class="wed_light_nav wed_transp_nav">
        <div class="container">

          <!-- couple header -->
          <img class="wed_couple_header wed_kissing_couple animated extra" src="images/3.png" alt=""/>
          <img class="wed_couple_header wed_white_couple animated extra" src="images/3_white_couple.png" alt=""/>
          <!-- couple header end -->

          <!-- Logo -->
          <a href="#" class="wed_logo wed_logo_animation">{{$event->name_of_bride}} & {{$event->name_of_groom}}</a>

          <!-- Text Logo -->
          <div class="wed_logo_und">Wedding</div>


          <div class="wed_top_menu_mobile_link">
            <i class="ti ti-menu"></i>
          </div>
          <!-- Top Menu -->
          <div class="wed_top_menu_cont">
              <ul class="wed_top_menu">
                <li class="wed_parent"><a href="#">Home</a>
                </li>
                <li><a href="#story">Story</a></li>
                <li><a href="#where">Where&When</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#journal">Wedding Journal</a></li>   
                <li><a href="#rsvp">RSVP</a></li>                
              </ul>
          </div>
          <!-- Top Menu End -->
        </div>
        <!-- container end -->
      </nav>

    </header>
    <!-- Header End -->


    <!-- Slider -->
    <div class="wed_slider wed_image_bck wed_fixed wed_wht_txt" data-stellar-background-ratio="0.2" data-image="{{$event->cover_image?Storage::url($event->cover_image):'http://placehold.it/1400x900'}}">

      <!-- over -->
      <div class="wed_over" data-color="#000" data-opacity="0.1" data-blend="multiply"></div>
      
      <div class="container">

        <!-- Slider Texts -->
        <div class="wed_slide_txt wed_slide_right text-center"  data-0="opacity:1;" data--400-bottom="opacity:0;">
          <img src="images/save_right.png" height="550" alt="">
        </div>
        <!-- Slider Texts End -->

      </div>
      <!-- container end -->

    </div>
    <!-- Slider End -->

    <!-- Content -->
    <section id="wed_content" class="wed_content">

      <!-- section -->
      <section class="wed_section_inner wed_image_bck wed_fixed wed_wht_txt" data-stellar-background-ratio="0.2" data-image="{{Storage::url($event->bride_cover)}}" >
        <!-- OVER -->
        <div class="wed_over" data-color="#000" data-opacity="0.1"></div>
        <div class="container">
            <div class="row wed_auto_height wed_middle_titles ">

                <!-- animation -->
              <div data-animation="animation_blocks" data-bottom="@class:noactive" data--100-bottom="@class:active">

                <div class="col-md-5 wed_image_bck wed_fixed text-left wed_small_arrow">
                    <h2 class="wed_image_bck" data-txt-color="#f50">{{$event->name_of_bride}}</h2>
                    <h4>Mlada</h4>
                    <p>{{$event->bride_about}}</p>
                    <p><img src="images/laracroft_sign.png" height="80" alt=""></p>
                </div>
                <!-- col end -->

              </div>
              <!-- Animation End -->
            </div>
            <!-- row end -->
        </div>          
        <!-- container end -->
      </section>
      <!-- section end -->

      <!-- section -->
      <section class="wed_section_inner wed_image_bck wed_fixed wed_wht_txt" data-stellar-background-ratio="0.2" data-image="{{Storage::url($event->groom_cover)}}" >

        <!-- OVER -->
        <div class="wed_over" data-color="#000" data-opacity="0.1"></div>

        <div class="container">
          <div class="row wed_auto_height wed_middle_titles">

            <!-- animation -->
            <div data-animation="animation_blocks" data-bottom="@class:noactive" data--100-bottom="@class:active">

              <div class="col-md-5 col-md-offset-7 wed_image_bck wed_fixed text-left wed_groom wed_small_arrow" >
                  <h2>{{$event->name_of_groom}}</h2>
                  <h4>Mladoženja</h4>
                  <p>{{$event->groom_about}}</p>
                  <p><img src="images/Robert_Mugabe_Signature_wh.png" height="80" alt=""></p>

              </div>
              <!-- col end -->
            </div>
            <!-- Animation End -->

          </div>
          <!-- row end -->
        </div>          
        <!-- container end -->

      </section>
      <!-- section end -->

        <!-- section -->




        <!-- story section -->
        @if($posts_stories->count() > 0)
        <section id="story" class="wed_section_outter">

          <div class="container">             
            <div class="row">

                <div class="col-sm-12 col-md-offset-2 col-md-8 text-center">
                    <div class="wed_topstory_titile wed_great_titles">
                        <h2 class= "wed_without_after wed_image_bck" data-txt-color="#f50" >
                            Our <img class="wed_small_img" src="{{asset('themes/images/1.png')}}" alt=""> Story
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Row end -->
            @foreach($posts_stories as $story)
            <!-- animation -->
            <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">  
              <!-- item-->
              <div class="row wed_story_row">    

                  <div class="col-sm-12 col-md-5 text-center wed_bd" >
                      <div class="wed_second_border wed_image_bck" data-border="#f50"></div>
                      <div class="wed_portfolio_item wed_story_img">
                        <div class="wed_portfolio_item_cont wed_story_cont wed_image_bck" data-border="#f50">

                           <!--PHOTO-->
                          <img class= "wed_img_height" src="{{Storage::url($story->image)}}" alt="" >                            
                            <!--ICON LINK-->
                          <span class="wed_port_titles">
                            <span class="wed_port_title">{{$story->title}}</span>
                            <span class="wed_port_subtitle">Ribfest 2016</span>
                            <span class="wed_port_icons">
                                <a href="#"><i class="ti ti-link"></i></a>
                                <a href="{{Storage::url($story->image)}}" class="lightbox"><i class="ti ti-search"></i></a>
                            </span>
                          </span>
                          <!--END of ICON LINK-->

                        </div>
                      </div>
                  </div>

                  <div class="col-md-2 hidden-sm hidden-xs text-center">   
                    <div class="wed_story_center">
                      <div class="wed_story_content wed_image_bck" data-color="#f50">
                        <div class="wed_heart_container">
                          <img class="wed_heart_1" src="images/small_people/heart_3.png" alt="">
                          <img class="wed_heart_2" src="images/small_people/heart_2.png" alt="">
                        </div>
                        <div class="wed_story_small_img">
                          <img src="images/small_people/couple_1.png" alt="">
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-5">
                    <div class="wed_story_txt">
                      <h3>{{$story->title}}</h3>
                      <div class="wed_month_year">{{$story->date->format('d M Y')}}</div>
                      <h5>That day changed everything</h5>
                      <p>{{$story->body}}</p> 

                    </div>                           
                  </div>    

                   
                   <div class="wed_vertical_line wed_line_top hidden-sm hidden-xs"></div>
                </div>
                <!-- END of STORY ROW-1 -->
              </div>
              <!-- Animation End -->
              @endforeach
          </div>
          <!-- END of CONTAINER -->

        </section> 
        @endif
        <!-- Section end -->

      

      <!-- White border -->
      <div class="wed_white_inner_border">
        <!-- section -->
        <section class="wed_section_inner wed_image_bck wed_wht_txt wed_fixed" data-stellar-background-ratio="0.2" data-image="images/white_slider.jpg">
          <!-- Over -->
          <div class="wed_over" data-color="#f50" data-opacity="0.7"></div>
          <div class="wed_over" data-color="#f50" data-opacity="0.9" data-blend="screen"></div>

          <div class="container">
            <div class="row wed_auto_height wed_middle_titles">
              <div class="col-md-12 wed_image_bck wed_fixed text-center" >
                  <h2>Don't miss it!</h2>                    
              </div>
              <!-- col end -->
            </div>
            <!-- row end -->
            <span class="wed_countdown" data-year="{{$event->date->format('Y')}}" data-month="{{$event->date->format('m')}}" data-day="{{$event->date->format('d')}}"></span>   
          </div>          
          <!-- container end -->

        </section>
        <!-- section end -->
      </div>      
      <!-- White border end-->

      @if($guest_texts->count() > 0)
        <section id="story" class="wed_section_outter">
         
          <div class="container">             
            <div class="row">

                <div class="col-sm-12  col-md-12 text-center">
                    <div class="wed_topstory_titile wed_great_titles">
                        <h2 class= "wed_without_after wed_image_bck" data-txt-color="#f50" >
                           <img class="wed_small_img" src="{{asset('themes/images/1.png')}}" alt="">
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Row end -->
           
             
              <!-- animation -->
              @foreach($guest_texts as $text_question)
            
              <div data-animation="animation_blocks" data-bottom="@class:noactive" data--10-bottom="@class:active">  
                <!-- item-->
                <div class="row wed_story_row">    
                  <h3 class="text-center">{{$text_question->question}}</h3>
                  
                  @foreach($text_question->gusetsText as $text)
                    <div class="col-md-6  hidden-sm hidden-xs text-center">   
                    <div class="col-sm-12 col-md-12">
                      <div class="wed_story_txt text-center">
                        <h3>{{$text->guest->name}}</h3>
                        <p>{{$text->answer}}</p> 

                      </div>                           
                    </div>  
                    </div>
                    @endforeach
                      

                    
                    <div class="wed_vertical_line wed_line_top hidden-sm hidden-xs"></div>
                  </div>
                  <!-- END of STORY ROW-1 -->
                  @endforeach
                </div>
                <!-- Animation End -->
                
              
          </div>
          <!-- END of CONTAINER -->
          
        </section> 
        @endif
        <!-- Section end -->
      <!-- section -->
      <section class="wed_section_outter">
        <div class="container text-center wed_great_titles">

        <h2>Gift Registry</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa similique porro officiis nobis nulla quidem nihil iste veniam ut sit, maiores.</p>
          <!-- boxes -->
          <div class="wed_icon_boxes row text-center">

              <div class="col-md-8 col-md-offset-2">
                  <div class="row">
                      <!-- item -->
                    <div class="col-md-4 col-sm-4">
                        <a href="#" class="wed_news_block">
                          <span class="wed_gifts_img wed_image_bck" data-border="#e4d4fb">
                            <img src="http://placehold.it/400x150" alt="">
                          </span>
                        </a>
                    </div> 

                    <!-- item -->
                    <div class="col-md-4 col-sm-4">
                      <a href="#" class="wed_news_block">
                        <span class="wed_gifts_img wed_image_bck" data-border="#e4d4fb">
                           <img src="http://placehold.it/400x150" alt="">
                        </span>
                      </a>
                    </div> 

                    <!-- item -->
                    <div class="col-md-4 col-sm-4">
                      <a href="#" class="wed_news_block">
                        <span class="wed_gifts_img wed_image_bck" data-border="#e4d4fb">
                            <img src="http://placehold.it/400x150" alt="">
                        </span>
                      </a>
                    </div> 
                  </div>
              </div>

          </div>
          <!-- boxes end -->
        </div>
        <!-- container end -->
      </section>
      <!-- section end -->

      <!-- White border -->
         
      <!-- White border end -->

      <!-- section -->
      <section id="gallery" class="wed_section_outter wed_image_bck">


        <div class="container text-center wed_great_titles">

          <h2>Our Gallery</h2>


          <!-- filters -->
          <div class="button-group filter-button-group">
            <a data-filter="*">Show All</a>
            @foreach($photos as $photo)
            <a data-filter=".photos-{{$photo->id}}">{{$photo->question}}</a>
            @endforeach
            <a data-filter=".web_design">Engagement</a>
            <a data-filter=".graphic_design">First Dates</a>
            <a data-filter=".logo_design">Trip</a>
          </div>
          <!-- filters end -->


          <!-- grid -->
          <div class="wed_portfolio grid">
              @foreach($photos as $photo)
              <!-- item -->
              @foreach($photo->gusetsMedia->sortBy('sort') as $guestAnswer)
              <div class="col-sm-3 wed_portfolio_item grid-item photos-{{$photo->id}}">
                <div class="wed_portfolio_item_cont">
                  <img src="{{Storage::url($guestAnswer->path)}}" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">{{$photo->question}}</span>
                    <span class="wed_port_icons">
                      <a href="#"><i class="ti ti-link"></i></a>
                      <a href="{{Storage::url($guestAnswer->path)}}" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>
              @endforeach    
              
                @endforeach
              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item web_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                    <span class="wed_port_icons">
                      <a href="#"><i class="ti ti-link"></i></a>
                      <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item graphic_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                    <span class="wed_port_icons">
                      <a href="#"><i class="ti ti-link"></i></a>
                      <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item graphic_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">Love Story</span>
                    <span class="wed_port_icons">
                      <a href="#"><i class="ti ti-link"></i></a>
                      <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item web_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                    <span class="wed_port_icons">
                      <a href="#"><i class="ti ti-link"></i></a>
                      <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item graphic_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                      <span class="wed_port_icons">
                        <a href="#"><i class="ti ti-link"></i></a>
                        <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                      </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item logo_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                    <span class="wed_port_titles">
                      <span class="wed_port_title">Love Story</span>
                      <span class="wed_port_icons">
                        <a href="#"><i class="ti ti-link"></i></a>
                        <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                      </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item web_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">Love Story</span>
                    <span class="wed_port_icons">
                      <a href="#"><i class="ti ti-link"></i></a>
                      <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item logo_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                    <span class="wed_port_icons">
                      <a href="#"><i class="ti ti-link"></i></a>
                      <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                    </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item logo_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">Love Story</span>
                      <span class="wed_port_icons">
                        <a href="#"><i class="ti ti-link"></i></a>
                        <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                      </span>
                  </span>
                </div>
              </div>

              <!-- item -->
              <div class="col-sm-3 wed_portfolio_item grid-item logo_design">
                <div class="wed_portfolio_item_cont">
                  <img src="http://placehold.it/790x766" alt="">
                  <span class="wed_port_titles">
                    <span class="wed_port_title">First Met</span>
                      <span class="wed_port_icons">
                        <a href="#"><i class="ti ti-link"></i></a>
                        <a href="http://placehold.it/1400x900" class="lightbox"><i class="ti ti-search"></i></a>
                      </span>
                  </span>
                </div>
              </div>

          </div>
          <!-- grid end -->

        </div>
        <!-- container end -->

      </section>
      <!-- section end -->

      <!-- White border -->
      <div class="wed_white_inner_border">

        <!-- section -->
        <section class="wed_section_inner wed_image_bck wed_wht_txt wed_fixed wed_border" data-stellar-background-ratio="0.2" data-image="http://placehold.it/1400x900" >
          <!-- Over -->
          <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.7"></div>
          <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.9" data-blend="screen"></div>

          <div class="container">
            <div class="row wed_thin_titles">
              <div class="col-md-12 text-center" >
                <h2>“ The best gift is your patecipation, thanks to all ”</h2>   
              </div>
              <!-- col end -->
            </div>
            <!-- row end -->
          </div>          
          <!-- container end -->

        </section>
        <!-- section end -->
      </div>   
      <!-- White border end-->

      <!-- Section -->
      <section class="wed_section_outter">

        <div class="container text-center wed_great_titles">
          <h2>Our best friends</h2>
          <p>Our best friends who will help us and we highly appreciate that! Thanks for being there with us! We feel your help within the time and wish it lasts forever...</p>

                <!-- boxes -->
                <div class="wed_icon_boxes row text-center">

                    <!-- slider -->  
                    <div class="wed_team_slider">
                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!-- Pop-up -->
                          <div class="wed_testimonials">
                              <h4><b>Lawrence Stephens</b></h4>
                              <p>Best Firend</p>
                              <div class="wed_item_social">
                                  <a href="#"><i class="ti ti-facebook"></i></a>
                                  <a href="#"><i class="ti ti-twitter-alt"></i></a>
                                  <a href="#"><i class="ti ti-google"></i></a>
                              </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="http://placehold.it/500x750" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Lawrence Stephens</b></h4>
                          <p>Bridesmaid</p>
                      </div> 
                      

                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!-- Pop-up -->
                          <div class="wed_testimonials">
                            <h4><b>Amber Richards</b></h4>
                            <p>Best Firend</p>
                            <div class="wed_item_social">
                              <a href="#"><i class="ti ti-facebook"></i></a>
                              <a href="#"><i class="ti ti-twitter-alt"></i></a>
                              <a href="#"><i class="ti ti-google"></i></a>
                            </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="http://placehold.it/500x750" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Amber Richards</b></h4>
                          <p>Groomsman</p>
                      </div> 
                      

                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!-- Pop-up -->
                          <div class="wed_testimonials">
                            <h4><b>Carolyn Moreno</b></h4>
                            <p>Best Firend</p>
                            <div class="wed_item_social">
                              <a href="#"><i class="ti ti-facebook"></i></a>
                              <a href="#"><i class="ti ti-twitter-alt"></i></a>
                              <a href="#"><i class="ti ti-google"></i></a>
                          </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="http://placehold.it/500x750" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Carolyn Moreno</b></h4>
                           <p>Bridesmaid</p>
                      </div> 

                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!--Pop-up -->
                          <div class="wed_testimonials">
                            <h4><b>Donald Green</b></h4>
                            <p>Best Firend</p>
                            <div class="wed_item_social">
                              <a href="#"><i class="ti ti-facebook"></i></a>
                              <a href="#"><i class="ti ti-twitter-alt"></i></a>
                              <a href="#"><i class="ti ti-google"></i></a>
                          </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="http://placehold.it/500x750" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Donald Green</b></h4>
                          <p>Groomsman</p>
                      </div> 

                      <!-- item -->
                      <div class="wed_icon_box wed_test_cont">

                          <!-- Pop-up -->
                          <div class="wed_testimonials">
                            <h4><b>Sindy Richards</b></h4>
                            <p>Best Firend</p>
                            <div class="wed_item_social">
                              <a href="#"><i class="ti ti-facebook"></i></a>
                              <a href="#"><i class="ti ti-twitter-alt"></i></a>
                              <a href="#"><i class="ti ti-google"></i></a>
                          </div>
                          </div>

                          <!-- photo -->
                          <div class="wed_icon_box_photo_testimonials">
                              <img src="http://placehold.it/500x750" alt="">
                          </div>

                          <!-- titles -->
                          <h4 class="wed_test_name"><b>Sindy Richards</b></h4>
                          <p>Bridesmaid</p>
                      </div> 

                    </div>             
                    <!-- Slider end -->
                </div>
                <!-- boxes end -->
        </div>
        <!-- container end -->
      </section>
      <!-- section end -->
      
      <!-- White border -->
      <div class="wed_white_inner_border">
        <!-- section -->
        @if($adresses->count() > 0)
        <section id="where" class="wed_section_inner">
          <div class="container-full">
            <div class="row">
              @foreach($adresses as $adress)
              <div class="col-md-4 wed_wht_txt wed_image_bck wed_service_block" data-image="{{Storage::url($adress->photo)}}">
                <!-- Over -->
                <div class="wed_over" data-color="rgb(151, 124, 245)" data-opacity="0.3" data-blend="color"></div>
                <div class="wed_over" data-color="#000" data-opacity="0.3"></div>

                <div class="wed_simple_block text-center">
                  <h4>{{$adress->name}}</h4>
                  <br>
                  <p>{{$adress->location}}</p>
                </div>
              </div>
              @endforeach
              
            <!-- Row end -->
          </div>
          <!-- Container end -->
        </section>
        @endif
        <!-- section end -->

        <!-- section -->
        <section class="wed_section_outter">

          <!-- over -->
          <div class="wed_map_over text-center wed_wht_txt">
            <div class="wed_map_txt wed_icon_box">
              <img class="wed_small_img" src="images/small_people/rising_heart.png" alt="">
              <div class="wed_icon_box_content">
                <h4><b>Open The Map</b></h4>
              </div>
            </div>
          </div>
          <!-- over end -->

          <!-- over -->
          <div class="wed_over" data-color="rgb(193, 176, 249)" data-opacity="0.9"></div>
          
            <!-- map -->
            <div class="wed_map">
            
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d310746.90945683786!2d12.918360609588492!3d52.520582938561994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sru!4v1454387964065" style="border:0; height: 450px; width: 100%;" allowfullscreen></iframe>
            </div>
            <!-- map end -->
        </section>
        <!-- section end -->
      </div>
      <!-- Border End -->


      <!-- section -->
    
      <!-- section end -->

    <!-- White border -->
    <div class="wed_water_border">
      <!-- section -->
      
        <!--section end -->

          <!-- To Top -->
        <a href="#wed_page" class="wed_top ti ti-angle-up wed_go wed_image_bck" data-txt-color="#b58cf0"></a>
      </div>
      <!-- White border end -->
    </section>
    <!-- content end -->
  </div>
  <!-- Page End -->
@endsection
