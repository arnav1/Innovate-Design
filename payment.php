<!DOCTYPE html>
<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "JBZaLc";

// Merchant Salt as provided by Payu
$SALT = "GQs7yium";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
    
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
          || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
    foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

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
        <script>
            var hash = '<?php echo $hash ?>';
            function submitPayuForm() {
                if(hash == '') {
                return;
                }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
            }
        </script>
    </head>
    
    <body onload="submitPayuForm()">
        
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
                        <?php if($formError) { ?>
                        <span style="color:red">Please fill all mandatory fields.</span>
                        <br/>
                        <br/>
                        <?php } ?>
                        <form action="<?php echo $action; ?>" method="post" name="payuForm" class="form-horizontal">
                          <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                          <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                          <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

                          <div class="form-group">
                            <label for="amount" class="col-sm-2 control-label">Amount</label>
                            <div class="col-sm-6">
                              <input type="text" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" class="form-control" placeholder="Enter the amount here">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-6">
                              <input type="text" name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname'] ?>" class="form-control" placeholder="Enter your name here">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                              <input type="email" name="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" class="form-control" placeholder="Enter email address">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Contact</label>
                            <div class="col-sm-6">
                              <input type="text" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone'] ?>" class="form-control" placeholder="Enter your phone number">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="productinfo" class="col-sm-2 control-label">Service Used</label>
                            <div class="col-sm-6">
                              <textarea name="productinfo" class="form-control"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea>
                            </div>
                          </div>
                                
                          <input type="hidden" name="surl" value="innovatedesign.in/success.php">
                          <input type="hidden" name="furl" value="innovatedesign.in/failure.php">
                          <input type="hidden" name="service_provider" value="payu_paisa">

                          <?php if(!$hash) { ?>
                              <button type="submit" class="btn btn-primary" value="Submit">Pay Now</button>
                          <?php } ?>
                          </tr>
                        </table>
                      </form>
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