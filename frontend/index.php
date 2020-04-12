<?php
  include 'top_header.php';
?>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 ">
        <div class="about-img"><img src="img/about.jpg" class="img-responsive" alt=""></div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2>Our Restaurant</h2>
          <hr>
          <p>Hungry? Had a long and busy day? You’ve come to the right place. foodpanda offers fast and convenient food delivery service from the best restaurants near you. Whether you’re craving for pizza, burger, Japanese or anything in between, foodpanda has an extensive roster of restaurants in Cambodia;

            Fancy some Lort Cha? How about a scrumptious bowl of Hainanese rice and roasted chicken? We have plenty of restaurants available for you to order food online and delivered straight to your location.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Restaurant Menu Section -->
<div id="restaurant-menu">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Menu</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Breakfast & Starters</h2>
          <hr>
          <div class="menu-item">
            <div class="menu-item-name"> Delicious Dish </div>
            <div class="menu-item-price"> $35 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name"> Delicious Dish </div>
            <div class="menu-item-price"> $30 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Luanch</h2>
          <hr>
          <div class="menu-item">
            <div class="menu-item-name"> Delicious Dish </div>
            <div class="menu-item-price"> $45 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name"> Delicious Dish </div>
            <div class="menu-item-price"> $30 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Dinner</h2>
          <hr>
          <div class="menu-item">
            <div class="menu-item-name"> Delicious Dish </div>
            <div class="menu-item-price"> $45 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name"> Delicious Dish </div>
            <div class="menu-item-price"> $350 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
        
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <h2 class="menu-section-title">Coffee & Drinks</h2>
          <hr>
          <div class="menu-item">
            <div class="menu-item-name"> Delicious Dish </div>
            <div class="menu-item-price"> $35 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name"> Delicious Dish </div>
            <div class="menu-item-price"> $30 </div>
            <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
          </div>
       
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Portfolio Section -->
<div id="portfolio">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Gallery</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="categories">
        <ul class="cat">
          <li>
            <ol class="type">
            <!--   <li><a href="#" data-filter="*" class="active">All</a></li> -->
              <li><a href="#" data-filter=".breakfast">Breakfast</a></li>
              <li><a href="#" data-filter=".lunch">Lunch</a></li>
              <li><a href="#" data-filter=".dinner">Dinner</a></li>
            </ol>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/01-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
             
             </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 dinner">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/02-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
            <?php
                  $breakfast_sql="SELECT*FROM item ";
                  $result=$conn->query($breakfast_sql);
                  while ($row=$result->fetch_assoc()) {
                   echo '
                  <img  src="../backend/pages/images/products/'.$row['item_image'].'" class="img-responsive" alt="Project Title">
                   ';
                  }
              ?> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/03-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/03-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/04-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/04-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 dinner">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/05-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/05-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 lunch">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/06-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/06-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 lunch">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/07-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/07-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/08-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/08-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 dinner">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/09-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/09-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 lunch">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/10-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/10-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 lunch">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/11-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/11-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/portfolio/12-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Dish Name</h4>
              </div>
              <img src="img/portfolio/12-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Team Section -->
<div id="team" class="text-center">
  <div class="overlay">
    <div class="container">
      <div class="col-md-10 col-md-offset-1 section-title">
        <h2>Meet Our Chefs</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed dapibus leonec.</p>
      </div>
      <div id="row">
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team/01.jpg" alt="..."></div>
            <div class="caption">
              <h3>Mike Doe</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team/02.jpg" alt="..."></div>
            <div class="caption">
              <h3>Chris Doe</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team/03.jpg" alt="..."></div>
            <div class="caption">
              <h3>Ethan Doe</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  $msg_content_title=$msg_content_category=$msg_content_description=$msg_content_order=$message_contact="";
            if (isset($_REQUEST['btn_contact'])) {
                 echo  $name=$_REQUEST['name'];
                 echo $gmail=$_REQUEST["gmail"];
                echo  $message=$_REQUEST["message"];
                    $insert_contact=mysqli_query($conn,"INSERT INTO contact(name,gmail,message) VALUES('$name','$gmail','$message')");
                    if ($insert_contact==TRUE) {
                      $message_contact='<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success</strong> Your message has been sent 
                    </div>';
                    }
                    else{
                      $message_contact='<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Failed</strong>Your message has not been sent
                    </div>'.$conn->error;
                    }   
            }
?>
<!-- Call Reservation Section -->
<div id="call-reservation" class="text-center">
  <div class="container">
    <h2>Want to make a reservation? Call <strong>1-887-654-3210</strong></h2>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title text-center">
      <h2>Contact Form</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
    </div>
    <div class="col-md-10 col-md-offset-1">
      <form novalidate method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text"  class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email"  class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message"  class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-custom btn-lg" name="btn_contact">Send Message</button>
      </form>
    </div>
  </div>
</div>
<?php
  include 'footer.php';
?>