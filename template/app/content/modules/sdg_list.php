<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-10">
			<div class="row justify-content-center">
			<?php
				// $sdgs = array(2,3,1,7,6,5,4,8);
				// $sdgs = array(1,2,3,4,5,6,7,8);
				// foreach($sdgs as $sdg) {
				// 	print '<div class="col-4 col-sm-3 col-md-3"><a href="#" class="sdg-link sdg-wrapper-'.$sdg.'" data-modal="sdg" data-type="sdg-'.$sdg.'">'.sdg_icon($sdg).'</a></div>';
				// }
				$sdgs = array();
				$sdg_icons = get_field('sdg_icons', 'options');

				if(is_array($sdg_icons)) {
					foreach($sdg_icons as $sdg) {
						// icon
						// title
						// description

						print '
							<div class="col-4 col-sm-3 col-md-3">
								<a href="#" class="sdg-link sdg-wrapper-'.$sdg['icon'].'" data-modal="sdg" data-type="sdg-'.$sdg['icon'].'">
									'.sdg_icon($sdg['icon']).'

									<div class="sdg-modal-content">
										<h1>'.$sdg['title'].'</h1>
										<div class="sdg-description">
											'.$sdg['description'].'
										</div>
									</div>
								</a>
							</div>';
					}
				}
				
			?>
			</div>
		</div>
	</div>
</div>