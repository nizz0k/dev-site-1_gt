

<section <?php getAnchorTags('Form'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<?php
					advanced_form('form_5a73113ccc87c');
				?>



				<svg width="500" height="350">
  <circle id="orange-circle" r="30" cx="50" cy="50" fill="orange" />
  <rect id="blue-rectangle" width="50" height="50" x="25" y="200" fill="#0099cc"></rect>
  
  <animate 
           xlink:href="#orange-circle"
           attributeName="cx"
           from="50"
           to="450" 
           dur="5s"
           begin="0s"
           repeatCount="2"
           fill="freeze" 
           id="circ-anim"/>
  
  <animate 
           xlink:href="#blue-rectangle"
           attributeName="x" 
           from="50"
           to="425" 
           dur="5s"
           begin="0s"
           repeatCount="indefinite"
           fill="freeze" 
           id="rect-anim"/>
  
</svg>
			</div>

		</div>
	</div>
</section>