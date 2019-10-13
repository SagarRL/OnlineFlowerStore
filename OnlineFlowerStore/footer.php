	<?php

echo"<footer class='container-fluid text-center'>";
   echo"<div class='grid__item one-third small--one-whole large--text-right'>";
            echo"<div itemscope itemtype='http://schema.org/LocalBusiness'>";
              echo"© 2017,";
echo"<span itemprop='name1'>The Secret Garden</span>";
              echo"<br>";
echo"<p itemprop='address' >";
              echo"<span itemprop='telephone'>8123786849</span>
  <br>
<span itemprop='streetAddress'>Yellhanka</span>
<span itemprop='addressLocality'>Banglore</span>

<span itemprop='postalCode'>560064</span>
              </p>
</div>
</footer>;

<script src='js/jquery-1.10.2.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>

$(document).on('mouseenter','.product-img-thumb',function(){

var data_img_id= $(this).attr('data-img-id');
$('.product-img').hide();
$('#product-img-'+data_img_id).show();
	
});
</script>
</body>
</html>";

?>