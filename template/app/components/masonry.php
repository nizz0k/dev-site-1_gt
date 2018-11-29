
<?php 
	// $ratios = array('ratio-1-1')

function createMasonry($size,$ratio, $text = '') {
	print '

		<div class="masonry-item tile '.$size.' '.$ratio.' ">
			<div class="inner-tile-wrapper">
				<div class="inner-tile background-image" style="background-image: url(sample/1.jpg);">
					<small>26. Januar 2018</small>
					<h2>Masonry Tile</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
		</div>

	';
}
?>

<section <?php getAnchorTags('Masonry'); ?>>
	<div class="container">
		<div class="masonry">
			<?php 

				createMasonry('col-md-6', 'ratio-1-1');
				createMasonry('col-md-6', 'ratio-2-1');
				createMasonry('col-md-6', 'ratio-2-1');


				createMasonry('col-md-6', 'ratio-2-1');
				createMasonry('col-md-6', 'ratio-2-1');


				createMasonry('col-md-6', 'ratio-2-1');
				createMasonry('col-md-6', 'ratio-1-1');
				createMasonry('col-md-6', 'ratio-2-1');

				createMasonry('col-md-6', 'ratio-2-1');

			?>
		</div>
	</div>
</section>