<!DOCTYPE html>
<html lang="en">

<head>
  <title>Simple landing page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/aos/css/aos.css">
  <link rel="stylesheet" href="css/style.min.css">
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="../prestyles.css">
  

</head>


<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <?php
  include 'sidebar.php';
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
  $currentuser = $_SESSION['user'];
  $conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
  $dbconn = pg_connect($conn_str);
  if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
  }

  $query = "SELECT departmentname FROM departments WHERE departmentid = " . $currentuser['departmentid'];
  $result = pg_query($dbconn, $query);
  $departmentname = pg_fetch_result($result, 0, 'departmentname');


  ?>
  
  <div class="banner flex flex-col w-screen justify-center items-center" >
    <div class="container w-full  h-screen" style="margin-top: 100px">
      <h1 class="font-weight-semibold mb-3">Office Online </h1>
  
      <div>
        <button class="btn btn-primary mr-1">Get started</button>
        <button class="btn btn-secondary ml-1">Learn more</button>
      </div>
      <img src="images/Group171.svg" alt="" class="img-fluid">
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
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Tony Martinez</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face3.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Sophia Armstrong</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face20.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face15.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face16.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face1.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Tony Martinez</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face2.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Tony Martinez</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face3.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Sophia Armstrong</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
            <div class="card customer-cards">
              <div class="card-body">
                <div class="text-center">
                  <img src="images/face20.jpg" width="89" height="89" alt="" class="img-customer">
                  <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <div class="content-divider m-auto"></div>
                  <h6 class="card-title pt-3">Cody Lambert</h6>
                  <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="contact-details" id="contact-details-section">
        <div class="row text-center text-md-left">
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <img src="images/Group2.svg" alt="" class="pb-2">
            <div class="pt-2">
              <p class="text-muted m-0">office_hcmut@gmail.dev</p>
              <p class="text-muted m-0">012-345-6789</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 grid-margin">
            <h5 class="pb-2">Get in Touch</h5>
            <p class="text-muted">Don’t miss any updates of our new features</p>
            <form>
              <input type="text" class="form-control" id="Email" placeholder="Email id">
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
  <script src="vendors/jquery/jquery.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="vendors/aos/js/aos.js"></script>
  <script src="js/landingpage.js"></script>
</body>

</html>