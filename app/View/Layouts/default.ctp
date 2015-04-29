<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('bootstrap','style'));
		echo $this->Html->script('jquery');
		echo $this->Html->script('map');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
        
        
        
        
        
        
        
        
        
	?>
</head>
<body>
	<div id="wrapper">
	    <header>
	        <div class="top-header">
	        	<div class="container">
	                <div class="right-header span4">    
	                	<ul class="top-nav">
	                    	<li><a href="#/">english</a></li></li>
	                        <li><span>|</span>
	                        <li><a href="#/">svenska</a></li></li>
	                        <li><span>|</span>
	                        <li><a href="#/">dansk</a></li></li>
	                        <li><span>|</span>
	                        <li><a href="#/">norsk</a></li></li>
	                        <li><span>|</span>
	                        <li><a href="#/">suomi</a></li></li>
	                        <li><span>|</span>
	                        <li><a href="#/">espanol</a></li></li>
							<li><span>|</span>                        
							<li><a href="#/">ภาษาไทย</a></li></li>
							<li><span>|</span>                        
							<li><a href="#/">فارسی</a></li></li>
							<li><span>|</span>                        
							<li><a href="#/">العربية</a></li></li>
							<li><span>|</span>                        
							<li><a href="#/">اردو</a></li></li>
	                    </ul>
	                </div><!--right-header-->
	            </div><!--container-->
	        </div><!--top-header-->
	        <nav>
	        	<div class="container">
	            	<ul class="navi span10">
	                	<li> 
						<?php echo $this->Html->link(
						    'home',
						    '/pages/home'
						    
						);
						?>
						</li>
						<li>
  						<?php echo $this->Html->link(
  						    'currency rate',
  						    '/pages/rates'  						);
  						?>	
  						</li>
						<li>
  						<?php echo $this->Html->link(
  						    'send money',
  						    '/pages/order'
  						);
  						?>	
  						</li>
						<li>
  						<?php echo $this->Html->link(
  						    'service fee',
  						    '/pages/services'
  						);
  						?>	
  						</li>
						<li>
  						<?php echo $this->Html->link(
  						    'my norfex',
  						    '/pages/login'
  						);
  						?>	
  						</li>
						<li>
  						<?php echo $this->Html->link(
  						    'about norfex',
  						    '/pages/about'
  						);
  						?>	
  						</li>
						<li>
  						<?php echo $this->Html->link(
  						    'contact norfex',
  						    '/pages/contact'
  						);
  						?>	
  						</li>
	                </ul><!--navi-->
	            </div><!--container-->
	        </nav>
	    </header>
	    <div id="main">
	    	<div class="main-top">
	            <div class="container">
		    		<?php echo $this->fetch('content'); ?>     
					<?php // echo $this->element('sql_dump'); ?>      
	            </div><!--container-->
	        </div><!--main-top-->
	        <div class="country-tab">
	            	<div class="container">
	                	<ul class="countries">
	                    	<li><a href="#/">sweden</a></li>
	                        <li><a href="#/">denmark</a></li>
	                        <li><a href="#/">norway</a></li>
	                        <li><a href="#/">finland</a></li>
	                    </ul>
	                </div><!--container-->
	            </div><!--country-tab-->
	    <div class="main-bottom">
	    	<div class="container">
	        	<div class="bottom-box span3">
	            	<h2>become customer</h2>
	                <div class="box-content">
	                	<p> Welcome as a customer with norfex. To be able to enjoy norfex money transfer and money exchange services, you should first register with norfex. It takes not more than 10 minutes of your time and you can then reach norfex variety of financial services and products.  </p>
	                    <br >
                        <a href="#/" style="" class="read-more">register here</a>
	                    <div class="box-img"><?php echo $this->Html->image('home-pic1.png', array('alt' => '')); ?></div>
	                </div><!--box-content-->
	            </div><!--bottom-box-->
	            <div class="bottom-box span3">
	            	<h2>currency convertor</h2>
	                <div class="box-content">
	                	<p>I want to exchange</p>
	                    <form>
	                    	<ul class="currency-converter">
	                        	<li>
	                            	<label>amount</label>
	                                <input type="text" class="text-field" name="amount" value="100" />
	                            </li>
	                            <li>
	                            	<label>from</label>
	                                <select>
	                                	<option value="">choose currency</option>
	                                </select>
	                            </li>
	                            <li>
	                            	<label>to</label>
	                                <select>
	                                	<option value="">choose currency</option>
	                                </select>
	                            </li>
	                            <li>
	                            	<label>equally</label>
	                                <span>23.5</span>
                                       <br > <br >   
	                            </li>
                                
	                        </ul>
                            
	                    </form>
                      
	                    <a href="#/"  class="read-more" style="margin-top: 5%;">calculate</a>
	                    <div class="box-img"><?php echo $this->Html->image('home-pic2.png', array('alt' => '')); ?></div>
	                </div><!--box-content-->
	            </div><!--bottom-box-->
	            <div class="bottom-box span3">
	            	<h2>call back</h2>
	                <div class="box-content">
	                	<form>
	                    	<div class="call-back">
	                        	<label>Do you want us to call you? Please enter your phone number here and we will call you back shortly 				</label>
									<?php echo $this->fetch('scriptBottom'); ?>
                                     <br > <br >  
	                        </div>
	                    </form>
                        
	                    <a href="#/" class="read-more">call me now</a>
	                    <div class="box-img"><?php echo $this->Html->image('home-pic3.png', array('alt' => '')); ?></div>
	                </div><!--box-content-->
	            </div><!--bottom-box-->
	        </div><!--container-->
	    </div><!--main-bottom-->
	    </div><!--main-->
	    <footer>
	    	<div class="container">
	        	<div class="footer-div1 span3">
	            	<ul class="footer-nav">
	                	<li>	<?php echo $this->Html->link(
							    'home',
							    '/pages/home'

							);?>
						</li>
	                    	<li>
	  						<?php echo $this->Html->link(
	  						    'currency rate',
	  						    '/pages/rates'  						);
	  						?>	
	  						</li>
							<li>
	  						<?php echo $this->Html->link(
	  						    'send money',
	  						    '/pages/order'
	  						);
	  						?>	
	  						</li>
							<li>
	  						<?php echo $this->Html->link(
	  						    'service fee',
	  						    '/pages/services'
	  						);
	  						?>	
	  						</li>
							<li>
	  						<?php echo $this->Html->link(
	  						    'my norfex',
	  						    '/pages/login'
	  						);
	  						?>	
	  						</li>
							<li>
	  						<?php echo $this->Html->link(
	  						    'about norfex',
	  						    '/pages/about'
	  						);
	  						?>	
	  						</li>
							<li>
	  						<?php echo $this->Html->link(
	  						    'contact norfex',
	  						    '/pages/contact'
	  						);
	  						?>	
	  						</li>
	                </ul>
	            </div><!--footer-div1-->
	            <div class="footer-div1 span3">
	            	<ul class="footer-nav">
	                	<li><a href="#/">become customer</a></li>
	                    <li><a href="#/">terms of services</a></li>
	                    <li><a href="#/">security</a></li>
	                    <li><a href="#/">about cookies</a></li>
	                    <li><a href="#/">AML and KYC</a></li>
	                    <li><a href="#/">privacy act</a></li>
	                </ul>
	            </div><!--footer-div1-->
	            <div class="footer-div1 span3">
	            	<ul class="footer-nav">
	                	<li><a href="#/">news</a></li>
	                    <li><a href="#/">facebook</a></li>
	                    <li><a href="#/">twitter</a></li>
	                    <li><a href="#/">map</a></li>
	                </ul>
	            </div><!--footer-div1-->
	            <div class="social-icons">
	            	<a href="#/"><?php echo $this->Html->image('footer-pic1.png', array('alt' => '')); ?></a>
	                <a href="#/"><?php echo $this->Html->image('footer-pic2.png', array('alt' => '')); ?></a>
	            </div>
	        </div><!--container-->
	    </footer>
	    <div class="copy-right">© Copyright 2008-2014 Nordic Foreign Exchange Ltd. All Rights Reserved.</div>
	</div><!--wrapper-->
    
		<div style="float: left;" id="footer">
		<?php echo $this->element('sql_dump'); ?>
		</div>
</body>
</html>

