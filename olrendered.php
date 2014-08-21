<!DOCTYPE html>

<html>
    <head>
        <title>INNOVATE DESIGNS</title>
        <head profile="http://www.w3.org/2005/10/profile">
            <link rel="icon" 
                type="image/png" 
                href="http://innovatedesign.in/img/favicon.png">
        <link type="text/css" rel="stylesheet" href="css/font-awesome.css" />
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="css/style.css" />
    </head>
    
    <body>
        
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                
                <div class="navbar-header">                    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>               
                    <a href="nindex.html" class="navbar-brand">INNOVATE DESIGNS</a>                    
                </div>
                
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="services.html">Services</a></li>
                        
                        <li><a href="renderings.html">Portfolio</a></li>

                         <li ><a href="team.html" >The Innovators</a></li>
                         <li ><a href="olrender.html" >Online Rendering</a></li>
                          <li><a href="rates.html" >Price</a></li> 
                          <li><a href="pay.html" >Payment</a></li> 
                        
                        <li><a href="#contact" data-toggle="modal">Contact</a></li>
                        <li><a href="https://docs.google.com/forms/d/1MUvvlowdwTsQjmLf8d4ex9cJGoVWwNuwy_DRwwcPZsw/viewform?usp=send_form">Subscribe</a></li> 
                    </ul>
                </div>
            
            </div>
        </div>

        <br><br><br><br>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Result of upload</h1>
                        <p>
                            <?php
//                                $allowedExts = array("jpeg", "jpg", "png");
//                                $temp = explode(".", $_FILES["file"]["name"]);
//                                $extension = end($temp);

//                                if ((($_FILES["file"]["type"] == "image/jpeg")
//                                    || ($_FILES["file"]["type"] == "image/jpg")
//                                    || ($_FILES["file"]["type"] == "image/pjpeg")
//                                    || ($_FILES["file"]["type"] == "image/x-png")
//                                    || ($_FILES["file"]["type"] == "image/png"))
//                                    && ($_FILES["file"]["size"] < 204800)
//                                                              && in_array($extension, $allowedExts)) {
                                                                if ($_FILES["file"]["error"] > 0) {
                                                                  echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                                                                } else {
                                                                  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                                                  echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                                                  echo "Size: " . ($_FILES["file"]["size"] / (1024*1024)) . " MB<br>";
                                                                  if (file_exists("upload/" . $_FILES["file"]["name"])) {
                                                                    echo $_FILES["file"]["name"] . " already exists. ";
                                                                  } else {
                                                                    move_uploaded_file($_FILES["file"]["tmp_name"],
                                                                    "upload/" . $_FILES["file"]["name"]);
                                                                    echo "Thank you! Your file has been stored.";
                                                                  }
                                                                }
//                                                              } else {
//                                                                echo "Invalid file";
//                                                              }
                                                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well">
                        
                        <a href="https://www.facebook.com/pages/Innovate-Designs/895434623806139?ref=hl&ref_type=bookmark"><i class="largeIcon fa fa-facebook-square"></i></a>
                        <a href="#"><i class="largeIcon fa fa-google-plus-square"></i></a>
                        <a href="#"><i class="largeIcon fa fa-linkedin-square"></i></a>
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="contact" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Get in touch with us!</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Enter your name"/>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Enter your email"/>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="message" class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="3" placeholder="Please input message here"></textarea>
                                </div>
                            </div>
                
                          
                
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-default">Clear</button>
                                </div>
                            </div>
                
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <p class="pull-left">Or you may reach us at:<br> 
                        Chennai:<br>
                        117, Tapti Hostel,<br>
                        IIT Madras,<br>
                        Chennai-600036<br><br>
                        Bhopal:<br>
                        E-109/14,Shivaji Nagar,<br>near Nutan College,<br> Bhopal-462016<br><br>
                        Contact:<br>
                        Rajat Yadav      : +91 9952 067 687  [Mail: yadavrajat800@gmail.com]<br>
                        Arnav Choudhry   : +91 9789 803 630  [Mail: choudhry.arnav@gmail.com]<br>
                        Email            : mail@innovatedesign.in</p>
                        <a class="btn btn-primary" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    
    </body>
</html>