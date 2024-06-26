<!DOCTYPE html>
<html lang="en">

<head>
  <title>HomePage</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./bootstraps/vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="./bootstraps/vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="./bootstraps/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./bootstraps/vendors/aos/css/aos.css">
  <link rel="stylesheet" href="./bootstraps/css/style.min.css">
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="../prestyles.css">
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <?php
  include 'sidebar.php';
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
  ?>
  <div class="banner flex flex-col w-screen justify-center items-center">
    <div class="w-screen  h-screen flex flex-row justify-between items-center"style="">
      <div class="flex flex-col gap-3 bg-white px-4 text-start justify-center items-start" style="width: 50%; height: 100%; padding-left: 220px !important;">
        <h1 style="font-size: 60px"class="font-weight-semibold"> Office Online</h1>
        <h4 style="color:gray; font-size: 40px">Real-time Solutions<br> for Companies</h4>
        <div >
          <a href="#features-section" >
            <button style="border-radius: 40px !important; margin-right: 200px;" class="btn btn-primary mr-1 px-4 py-2 text-xl">Get started now</button>
          </a>
        </div>
      </div>
      <div class="rounded-full flex justify-center items-center" style="width: 530px; height: 530px;margin-right: 100px; background-color: white; opacity: 0.8;">
        <img style="width: 530px; height: auto; object-fit: cover;" src="images/ilu.png" alt="" class="img-fluid">
      </div>
    </div>
  </div>
  <div class="content-wrapper flex justify-center items-center">
    <div class="container">
      <section class="features-overview px-10" id="features-section">
        <div class="content-header">
          <h2>How does it works</h2>
          <h5 class="section-subtitle text-muted">We consolidate and streamline all task management processes into a singular, centralized platform</h5>
        </div>
        <div class="d-md-flex justify-content-between">
          <div class="grid-margin d-flex justify-content-start">
            <div class="features-width">
              <img src="images/Group12.svg" alt="" class="img-icons">
              <h5 class="py-3">Role-based<br> Access Control</h5>
              <p class="text-muted">Administrators manage user roles and permissions, while Directors oversee task assignments. Department Heads manage tasks within their departments, and Staff access relevant tasks. This approach enhances security and confidentiality.</p>

            </div>
          </div>
          <div class="grid-margin d-flex justify-content-center">
            <div class="features-width">
              <img src="images/Group7.svg" alt="" class="img-icons">
              <h5 class="py-3">Task Management and <br>Assignment</h5>
              <p class="text-muted">Directors assign tasks to Department Heads, who further delegate tasks to Staff. The platform facilitates collaboration, providing task details, deadlines, and progress tracking. This streamlines communication and boosts productivity.</p>

            </div>
          </div>
          <div class="grid-margin d-flex justify-content-end">
            <div class="features-width">
              <img src="images/Group5.svg" alt="" class="img-icons">
              <h5 class="py-3">Task Review <br> Approval Workflow</h5>
              <p class="text-muted">Directors and Department Heads can accept, reject, or request revisions on tasks. Staff submit results, and superiors provide feedback. This ensures accountability and transparency in task completion.</p>

            </div>
          </div>
        </div>
      </section>
      <section class="digital-marketing-service flex justify-center items-center flex-col" id="digital-marketing-section">
        <div class="row align-items-center items-center flex justify-center" style="width: 900px !important">
          <div class="col-12 col-lg-7 grid-margin grid-margin" data-aos="fade-right">
            <h3 class="m-0">Join Our Team to <br>Unlock Efficiency </h3>
            <div class="p-0 w-full">
              <p class="py-4 m-0 text-muted">Seeking proactive individuals to join our team and revolutionize task management. With our centralized platform, you'll streamline operations, enhance communication, and boost productivity. Seeking proactive individuals to join our team and revolutionize task management. With our centralized platform, you'll streamline operations, enhance communication, and boost productivity. </p>
            </div>
          </div>
          <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
            <img src="images/Group1.png" alt="" class="img-fluid">
          </div>
        </div>
        <div class="row align-items-center items-center flex justify-center" style="width: 900px !important">
          <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
            <img src="images/Group2.png" alt="" class="img-fluid">
          </div>
          <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
            <h3 class="m-0">Revolutionize Management<br>Empower Collaboration</h3>
            <div class="p-0 w-full">
              <p class="py-4 m-0 text-muted">Our innovative platform empowers teams to work seamlessly, share insights, and achieve collective goals. Be part of the change, apply today and amplify teamwork.</p>

            </div>

          </div>
        </div>
      </section>
      <section class="customer-feedback" id="feedback-section">
        <div class="row">
          <div class="col-12 text-center pb-5">
            <h2>What our customers have said about us</h2>
            <h6 class="section-subtitle text-muted m-0">Intriguing insights derived from extensive, hands-on experience</h6>
          </div>
          <div class="owl-carousel owl-theme grid-margin">
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face2.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Our company swears by Office Online! It's like having a virtual office that keeps us all on the same page.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Tony Martinez</h6>
                  <h6 class="customer-designation text-muted m-0">General Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face3.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Can't imagine managing tasks without Office Online now. It's become our go-to tool for collaboration</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Sophia Armstrong</h6>
                  <h6 class="customer-designation text-muted m-0">General Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face20.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Props to Office Online for making our work life so much easier. It's intuitive and just works</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">General Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face15.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Office Online is a lifesaver for us busy bees. It's like having a personal assistant for task management.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">General Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face16.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">I'm constantly impressed by how Office Online streamlines our workflow. It's seriously a game-changer.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">General Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face1.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Kudos to the team behind Office Online. They've nailed it with a platform that's both powerful and user-friendly</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Tony Martinez</h6>
                  <h6 class="customer-designation text-muted m-0">General Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face2.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">I've tried a bunch of task management tools, but Office Online takes the cake. It's got everything we need.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Tony Martinez</h6>
                  <h6 class="customer-designation text-muted m-0">General Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face3.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">With Office Online, it's like our office is with us wherever we go. It's a real game-changer for remote work</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Sophia Armstrong</h6>
                  <h6 class="customer-designation text-muted m-0">General Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face20.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Our productivity levels have soared since we started using Office Online. It's become indispensable to our team</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">General Manager</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="contact-details" id="contact-details-section">
        <div class="row text-center text-md-left">
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <img src="../logo.png" style="width: 50px;" alt="" class="pb-2">
            <div class="pt-2">
              <p class="text-muted m-0">office_hcmut@gmail.dev</p>
              <p class="text-muted m-0">012-345-6789</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Get in Touch</h5>
            <p class="text-muted">Don’t miss any updates of our new features</p>
            <form>
              <input type="text" class="form-control mt-3" id="Email" placeholder="Email">
            </form>
            <div class="pt-3">
              <button class="btn btn-dark">Subscribe</button>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Our Guidelines</h5>
            <a href="#">
              <p class="m-0 pb-2">Terms and Conditions</p>
            </a>
            <a href="#">
              <p class="m-0 pt-1 pb-2">Privacy policy</p>
            </a>
            <a href="#">
              <p class="m-0 pt-1 pb-2">Cookie Policy</p>
            </a>

          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">

            <div class="flex flex-row gap-2">
              <a href="#"><span class="mdi mdi-facebook"></span></a>
              <a href="#"><span class="mdi mdi-twitter"></span></a>
              <a href="#"><span class="mdi mdi-instagram"></span></a>
              <a href="#"><span class="mdi mdi-linkedin"></span></a>
            </div>
          </div>
        </div>
      </section>
      <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2024<a href="https://www.bootstrapdash.com/" class="px-1">OFFICE ONLINE HCMUT</a>All rights reserved.</p>
      </footer>
      <!-- Modal for Contact - us Button -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Contact Us</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" id="Name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" class="form-control" id="Email-1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="Message">Message</label>
                  <textarea class="form-control" id="Message" placeholder="Enter your Message"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./bootstraps/vendors/jquery/jquery.min.js"></script>
  <script src="./bootstraps/vendors/bootstrap/bootstrap.min.js"></script>
  <script src="./bootstraps/vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="./bootstraps/vendors/aos/js/aos.js"></script>
  <script src="./bootstraps/js/landingpage.js"></script>
</body>

</html>