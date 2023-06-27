<!--********************************** Footer start ***********************************-->
<div class="footer">
	<div class="copyright">
		<p>
			Copyright © Developed &amp; Powered by
			<a href="https://www.zelustechnologies.com" target="_blank">
				Zelus Technologies
			</a> @php
				$currentYear = date('Y');
				$startYear = 2023;
				if ($currentYear > $startYear) {
				    echo $startYear . '-' . $currentYear;
				} else {
				    echo $startYear;
				}
			@endphp
		</p>
	</div>
</div>
<!--********************************** Footer end ***********************************-->
